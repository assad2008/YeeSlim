<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) 2015-2017 UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace UCSDMath\Functions;

/**
 * ServiceFunctions is the default implementation of {@link ServiceFunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link ServiceFunctions} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ServiceFunctions;
 * use UCSDMath\Functions\ServiceFunctionsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) array all();
 * (+) object init();
 * (+) string version();
 * (+) bool isString($str);
 * (+) bool has(string $key);
 * (+) string getClassName();
 * (+) int getInstanceCount();
 * (+) array getClassInterfaces();
 * (+) mixed getConst(string $key);
 * (+) bool isValidUuid(string $uuid);
 * (+) bool isValidEmail(string $email);
 * (+) bool isValidSHA512(string $hash);
 * (+) mixed __call($callback, $parameters);
 * (+) bool doesFunctionExist($functionName);
 * (+) bool isStringKey(string $str, array $keys);
 * (+) mixed get(string $key, string $subkey = null);
 * (+) mixed getProperty(string $name, string $key = null);
 * (+) object set(string $key, $value, string $subkey = null);
 * (+) object setProperty(string $name, $value, string $key = null);
 * (-) Exception throwExceptionError(array $error);
 * (-) InvalidArgumentException throwInvalidArgumentExceptionError(array $error);
 *
 * ServiceFunctions provides a common set of implementations where needed. The ServiceFunctions
 * trait and the ServiceFunctionsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait ServiceFunctions
{
    /**
     * Properties.
     */

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getProperty(string $name, string $key = null)
    {
        return null === $key ? $this->{$name} : $this->{$name}[$key];
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function __call($callback, $parameters)
    {
        return call_user_func_array($this->$callback, $parameters);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function setProperty(string $name, $value, string $key = null)
    {
        (null === $key) ? $this->{$name} = $value : $this->{$name}[$key] = $value;

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function version(): string
    {
        return static::VERSION;
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getClassName(): string
    {
        return get_class($this);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getClassInterfaces(): array
    {
        return class_implements($this);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getConst(string $key)
    {
        $constant = 'static::'.strtoupper($key);

        return defined($constant)
            ? constant($constant)
            : $this->throwInvalidArgumentExceptionError([
                'datatype|defined|{$key}',
                __METHOD__,
                __CLASS__,
                'ServiceFunctions [A103]'
            ]);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function init()
    {
        if (null === static::$instance) {
            static::$instance = new static;
            static::$objectCount++;
        }

        return static::$instance;
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function getInstanceCount(): int
    {
        return (int) static::$objectCount;
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function isString($str): bool
    {
        /**
         * Before using trim(), proxy the input; avoid type cast.
         */
        $str = is_string($str) ? trim($str) : $str;

        return is_string($str) && ! empty($str);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->getProperty('storageRegister'));
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function isStringKey(string $str, array $keys): bool
    {
        return $this->isString($str)
            && array_key_exists($str, $keys);
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function get(string $key, string $subkey = null)
    {
        return null === $subkey
            ? $this->getProperty('storageRegister', $key)
            : $this->{'storageRegister'}[$key][$subkey];
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function set(string $key, $value, string $subkey = null)
    {
        (null === $subkey)
            ? $this->setProperty('storageRegister', $value, $key)
            : $this->{'storageRegister'}[$key][$subkey] = $value;

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->getProperty('storageRegister');
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public static function doesFunctionExist($functionName): bool
    {
        return function_exists($functionName);
    }

    //--------------------------------------------------------------------------

    /**
     * Throw Exception Error.
     *
     * @param array $error The array data representation for the exception.
     *
     * @return \Exception
     */
    protected function throwExceptionError(array $error): \Exception
    {
        throw new \Exception(sprintf(
            'Method in: %s. Class in: %s. Message: %s. Reference: %s.',
            $error[0],
            $error[1],
            $error[2],
            $error[3]
        ));
    }

    //--------------------------------------------------------------------------

    /**
     * Exception thrown if an argument is not of the expected type.
     *
     * @param array $error The array data representation for the argument exception.
     *
     * @return \InvalidArgumentException
     */
    protected function throwInvalidArgumentExceptionError(array $error): \InvalidArgumentException
    {
        throw new \InvalidArgumentException(sprintf(
            'Provide valid: %s. See Method: %s. See Class: %s. See Reference: [%s]',
            $error[0],
            $error[1],
            $error[2],
            $error[3]
        ));
    }

    //--------------------------------------------------------------------------

    /**
     * Validate a email address.
     *
     * @param string $email The email address to validate
     *
     * @return bool
     */
    public function isValidEmail(string $email): bool
    {
        return filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL) !== false;
    }

    //--------------------------------------------------------------------------

    /**
     * Validate a (v4) UUID.
     *
     * @param string $uuid The UUID string to validate
     *
     * @return bool
     */
    public function isValidUuid(string $uuid): bool
    {
        return (bool) preg_match(static::VALID_UUID_PATTERN, $uuid);
    }

    //--------------------------------------------------------------------------

    /**
     * Basic SHA-512 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * @return bool
     */
    public function isValidSHA512(string $hash): bool
    {
        return (bool) preg_match('/^[a-fA-F\d]{128}$/', $hash);
    }

    //--------------------------------------------------------------------------
}
