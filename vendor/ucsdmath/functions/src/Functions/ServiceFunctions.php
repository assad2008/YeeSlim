<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) 2015-2018 UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
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
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) array all();
 * (+) object init();
 * (+) string version();
 * (+) bool isString($str);
 * (+) bool has(string $key);
 * (+) string getClassName();
 * (+) int getInstanceCount();
 * (+) mixed getConst(string $key);
 * (+) array getClassInterfaces();
 * (+) bool isValidUuid(string $uuid);
 * (+) bool isValidEmail(string $email);
 * (+) bool isValidSHA512(string $hash);
 * (+) bool doesFunctionExist(string $functionName);
 * (+) bool isStringKey(string $str, array $keys);
 * (+) mixed get(string $key, string $subkey = null);
 * (+) mixed getProperty(string $name, string $key = null);
 * (+) mixed __call(string $callback, array $parameters);
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
     * Return the storageRegister array.
     *
     * @return array
     *
     * @api
     */
    public function all(): array
    {
        return $this->getProperty('storageRegister');
    }

    //--------------------------------------------------------------------------

    /**
     * Initialization (Singleton Pattern).
     *
     * @static
     *
     * @return The current instance
     *
     * @api
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
     * Get the version number of the application.
     *
     * @return string
     *
     * @api
     */
    public function version(): string
    {
        return static::VERSION;
    }

    //--------------------------------------------------------------------------

    /**
     * Basic string validation.
     *
     * @param string $str The input parameter
     *
     * @return bool
     */
    public function isString($str): bool
    {
        /**
         * Before using trim(), proxy the input; avoid type cast.
         */
        $str = is_string($str)
            ? trim($str)
            : $str;

        return is_string($str) && !empty($str);
    }

    //--------------------------------------------------------------------------

    /**
     * Return true if parameter is defined.
     *
     * @param string $key The parameter name
     *
     * @return bool
     *
     * @api
     */
    public function has(string $key): bool
    {
        return array_key_exists($key, $this->getProperty('storageRegister'));
    }

    //--------------------------------------------------------------------------

    /**
     * Returns the current class name.
     *
     * @return string
     *
     * @api
     */
    public function getClassName(): string
    {
        return get_class($this);
    }

    //--------------------------------------------------------------------------

    /**
     * Returns instance count.
     *
     * @static
     *
     * @return int
     *
     * @api
     */
    public static function getInstanceCount(): int
    {
        return (int) static::$objectCount;
    }

    //--------------------------------------------------------------------------

    /**
     * Return class interfaces.
     *
     * @return array
     *
     * @api
     */
    public function getClassInterfaces(): array
    {
        return class_implements($this);
    }

    //--------------------------------------------------------------------------

    /**
     * Get constant property value.
     *
     * @param string $key The constant property name
     *
     * @return mixed The constant property value
     *
     * @throws \InvalidArgumentException if the property name is not defined
     *
     * @api
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

    /**
     * Basic string and array keys validation.
     *
     * @param string $str  The input parameter
     * @param array  $keys The associative array parameter
     *
     * @return bool
     */
    public function isStringKey(string $str, array $keys): bool
    {
        return $this->isString($str) && array_key_exists($str, $keys);
    }

    //--------------------------------------------------------------------------

    /**
     * Check if a required function exists.
     *
     * @param string $functionName The function name to check.
     *
     * @return bool The confirmation that the function exists.
     */
    public static function doesFunctionExist(string $functionName): bool
    {
        return function_exists($functionName);
    }

    //--------------------------------------------------------------------------

    /**
     * Get a storageRegister element.
     *
     * @param string $key    The element name
     * @param string $subkey The element subkey name
     *
     * @return mixed The element value
     *
     * @api
     */
    public function get(string $key, string $subkey = null)
    {
        return null === $subkey
            ? $this->getProperty('storageRegister', $key)
            : $this->{'storageRegister'}[$key][$subkey];
    }

    //--------------------------------------------------------------------------

    /**
     * Forward to any callable, including anonymous functions
     * (or any instances of \Closure).
     *
     * @param string $callback   The named callable to be called.
     * @param array  $parameters The parameters to be passed to the callback, as an indexed array.
     *
     * @return mixed the return value of the callback, or false on error.
     *
     * @api
     */
    public function __call(string $callback, array $parameters)
    {
        return call_user_func_array($this->$callback, $parameters);
    }

    //--------------------------------------------------------------------------

    /**
     * Get a property value.
     *
     * @param string $name The property name
     * @param string $key  The optional property key index
     *
     * @return mixed The property value
     *
     * @api
     */
    public function getProperty(string $name, string $key = null)
    {
        return null === $key
            ? $this->{$name}
            : $this->{$name}[$key];
    }

    //--------------------------------------------------------------------------

    /**
     * Set a storageRegister element.
     *
     * @param string $key    The element name
     * @param mixed  $value  The element value
     * @param string $subkey The element subkey name
     *
     * @return The current instance
     *
     * @api
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
     * Set a property value.
     *
     * @param string $name  The property name
     * @param mixed  $value The property value
     * @param string $key   The optional key index
     *
     * @api
     */
    public function setProperty(string $name, $value, string $key = null)
    {
        (null === $key)
            ? $this->{$name} = $value
            : $this->{$name}[$key] = $value;

        return $this;
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
}
