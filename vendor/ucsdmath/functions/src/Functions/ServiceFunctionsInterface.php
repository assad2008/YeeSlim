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
 * ServiceFunctionsInterface is the interface implemented by all Functions classes.
 *
 * Method list: (+) @api.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
interface ServiceFunctionsInterface
{
    /**
     * Constants.
     */

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
    public function getProperty(string $name, string $key = null);

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
    public function setProperty(string $name, $value, string $key = null);

    //--------------------------------------------------------------------------

    /**
     * Get the version number of the application.
     *
     * @return string
     *
     * @api
     */
    public function version(): string;

    //--------------------------------------------------------------------------

    /**
     * Check if a required function exists.
     *
     * @param string $functionName The function name to check.
     *
     * @return bool The confirmation that the function exists.
     */
    public static function doesFunctionExist($functionName): bool;

    //--------------------------------------------------------------------------

    /**
     * Returns the current class name.
     *
     * @return string
     *
     * @api
     */
    public function getClassName(): string;

    //--------------------------------------------------------------------------

    /**
     * Return class interfaces.
     *
     * @return array
     *
     * @api
     */
    public function getClassInterfaces(): array;

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
    public function getConst(string $key);

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
    public static function init();

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
    public static function getInstanceCount(): int;

    //--------------------------------------------------------------------------

    /**
     * Basic string validation.
     *
     * @param string $str The input parameter
     *
     * @return bool
     */
    public function isString($str): bool;

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
    public function has(string $key): bool;

    //--------------------------------------------------------------------------

    /**
     * Basic string and array keys validation.
     *
     * @param string $str  The input parameter
     * @param array  $keys The associative array parameter
     *
     * @return bool
     */
    public function isStringKey(string $str, array $keys): bool;

    //--------------------------------------------------------------------------

    /**
     * Validate a email address.
     *
     * @param string $email The email address to validate
     *
     * @return bool
     */
    public function isValidEmail(string $email): bool;

    //--------------------------------------------------------------------------

    /**
     * Validate a UUID.
     *
     * @param string $uuid The UUID string to validate
     *
     * @return bool
     */
    public function isValidUuid(string $uuid): bool;

    //--------------------------------------------------------------------------

    /**
     * Basic SHA-512 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * @return bool
     */
    public function isValidSHA512(string $hash): bool;

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
    public function get(string $key, string $subkey = null);

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
    public function set(string $key, $value, string $subkey = null);

    //--------------------------------------------------------------------------

    /**
     * Return the storageRegister array.
     *
     * @return array
     *
     * @api
     */
    public function all(): array;

    //--------------------------------------------------------------------------

    /**
     * Forward to any callable, including anonymous functions
     * (or any instances of \Closure).
     *
     * @param string $callback    The named callable to be called.
     * @param mixed  $parameters  The parameters to be passed to the callback, as an indexed array.
     *
     * @return mixed  the return value of the callback, or false on error.
     *
     * @api
     */
    public function __call($callback, $parameters);

    //--------------------------------------------------------------------------
}
