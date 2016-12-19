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

namespace UCSDMath\Functions\ExtendedOperations;

/**
 * GeneralFunctionMethods is the default implementation of {@link GeneralFunctionMethodsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link GeneralFunctionMethods} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ExtendedOperations\GeneralFunctionMethods;
 * use UCSDMath\Functions\ExtendedOperations\GeneralFunctionMethodsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) float sanitizeFloat($number);
 * (+) int sanitizeInteger($number);
 * (+) string getSpaces(int $number);
 * (+) string sanitizeString($str, $min = null, $max = null);
 * (+) bool integerIsBetween(int $integer, int $min, int $max);
 * (+) int getStringPositionX($haystack, $needle, $number = 1);
 * (+) bool isInteger($number, int $min = null, int $max = null);
 * (+) string addMacAddressSeparator(string $str, string $separator = ':');
 * (-) array getIntegerOptionsBetween(int $min = null, int $max = null);
 *
 * GeneralFunctionMethods provides a common set of implementations where needed. The GeneralFunctionMethods
 * trait and the GeneralFunctionMethodsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait GeneralFunctionMethods
{
    /**
     * Properties.
     */

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */
    abstract public function isValidStringLength($str, $min = null, $max = null): bool;

    //--------------------------------------------------------------------------

    /**
     * Add or replace MAC address delimiters/separators.
     *
     * @param string $str       The MAC address
     * @param string $separator The delimiter
     *
     * @return string The MAC addres with delimiter/separator [':','-']
     */
    public function addMacAddressSeparator(string $str, string $separator = ':'): string
    {
        return join($separator, str_split(preg_replace('/[^a-f0-9]/i', '', $str), 2));
    }

    //--------------------------------------------------------------------------

    /**
     * Sanitize a string.
     *
     * no piping, passing possible environment variables ($),
     * seperate commands, nested execution, file redirection,
     * background processing, special commands (backspace, etc.), quotes
     * newlines, or some other special characters
     *
     * Example: $firstname = sanitizeString($request->get('firstname'), 2, 44);
     *
     * @param string $str The string to sanitize
     *
     * @return string|false  return false if not valid string
     *
     * @api
     */
    public function sanitizeString($str, $min = null, $max = null): string
    {
        $pattern = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i';
        $str  = preg_replace($pattern, '', $str);
        $str  = preg_replace('/\$/', '\\\$', $str);
        if ($this->isValidStringLength($str, $min, $max)) {
            return $str;
        }

        return false;
    }

    //--------------------------------------------------------------------------

    /**
     * Check if integer is between MAX and MIN.
     *
     * @param int $integer The integer input
     * @param int $min     The minimum number
     * @param int $max     The maximum number
     *
     * @return bool
     *
     * @api
     */
    public function integerIsBetween(int $integer, int $min, int $max): bool
    {
        return (($integer >= $min) && ($integer <= $max));
    }

    //--------------------------------------------------------------------------

    /**
     * Sanitize an integer.
     *
     * @param int|string $number The number to filter
     *
     * @return int
     *
     * @api
     */
    public function sanitizeInteger($number): int
    {
        return (int) preg_replace('/[^\d]+/', '', $number);
    }

    //--------------------------------------------------------------------------

    /**
     * Find the position of the Xth occurrence of a substring in a string.
     *
     * @param string $haystack The string data used to find the occurrence
     * @param string $needle   The item occurrence to find
     * @param int    $number   The number describing the offset
     *
     * @return int
     *
     * @api
     */
    public function getStringPositionX($haystack, $needle, $number = 1): int
    {
        if (1 === $number) {
            return (int) strpos($haystack, $needle);
        } elseif (1 < $number) {
            return (int) strpos($haystack, $needle, $this->getStringPositionX($haystack, $needle, $number - 1) + strlen($needle));
        }

        return (int) false;
    }

    //--------------------------------------------------------------------------

    /**
     * Get a number of repeated spaces.
     *
     * @param int $number The number of repeats
     *
     * @return string The formatting spaces
     *
     * @api
     */
    public function getSpaces(int $number): string
    {
        return str_repeat(chr(32), $number);
    }

    //--------------------------------------------------------------------------

    /**
     * Sanitize a float.
     *
     * @param string|int|float $number The float to sanitize
     *
     * @return float
     *
     * @api
     */
    public function sanitizeFloat($number): float
    {
        return (float) filter_var($number, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    }

    //--------------------------------------------------------------------------

    /**
     * Validate as integer.
     *
     * @param int|string $number The integer to check
     * @param int        $min    The minimum integer value
     * @param int        $max    The maximum integer value
     *
     * @return bool
     */
    public function isInteger($number, int $min = null, int $max = null): bool
    {
        return isset($min) || isset($max)
            ? filter_var($number, FILTER_VALIDATE_INT, $this->getIntegerOptionsBetween($min, $max))
            : filter_var($number, FILTER_VALIDATE_INT);
    }

    //--------------------------------------------------------------------------

    /**
     * Get the Maximum and Minimum options for filtering.
     *    {@see Functions::isInteger($number, int $min = null, int $max = null): bool;}
     *
     * @param int $min The minimum integer value
     * @param int $max The maximum integer value
     *
     * @return array
     */
    protected function getIntegerOptionsBetween(int $min = null, int $max = null): array
    {
        $options = null;
        if (isset($min, $max)) {
            $options = array("options" => array("min_range" => $min, "max_range" => $max));
        } elseif (isset($min)) {
            $options = array("options" => array("min_range" => $min));
        } elseif (isset($max)) {
            $options = array("options" => array("max_range" => $max));
        }

        return $options;
    }

    //--------------------------------------------------------------------------
}
