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

use DateTime;
use Carbon\Carbon;

/**
 * ValidityFunctions is the default implementation of {@link ValidityFunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link ValidityFunctions} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ExtendedOperations\ValidityFunctions;
 * use UCSDMath\Functions\ExtendedOperations\ValidityFunctionsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) array getWeekdays();
 * (+) bool isValidIP($ipAddress);
 * (+) bool isAlpha($value);
 * (+) bool isValidIP4($ipAddress);
 * (+) bool isValidIP6($ipAddress);
 * (+) bool isValidMd5($hash);
 * (+) bool isZipcode($value);
 * (+) array getCalendarMonths();
 * (+) string cleanCurlies($str);
 * (+) bool getBoolean($value);
 * (+) bool isValidSHA1($hash);
 * (+) bool isValidURL($value);
 * (+) string stripNonAlpha($str);
 * (+) string getMySQLTimestamp();
 * (+) string seoFriendlyUrl($str);
 * (+) string stripNonNumeric($str);
 * (+) bool isMinimumPHPVersion();
 * (+) array trimArray(array $array);
 * (+) bool isPostalState($value);
 * (+) bool isAlphaNumeric($value);
 * (+) bool isValidMacAddress($str);
 * (+) string sanitizeDigitCommas($str);
 * (+) bool isValidIP4NoPrivate($ipAddress);
 * (+) bool isValidIP6NoPrivate($ipAddress);
 * (+) string sanitizeAlphaNumeric($str);
 * (+) string getFileExtension($filename);
 * (+) bool utf8Compliant($str = null);
 * (+) string stripExcessWhitespace($str);
 * (+) bool isValidDate($datetime, $format = 'Y-m-d H:i:s');
 * (+) string createHashFileName($filename, $extension = '.php');
 *
 * ValidityFunctions provides a common set of implementations where needed. The ValidityFunctions
 * trait and the ValidityFunctionsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait ValidityFunctions
{
    /**
     * Properties.
     *
     * @var array $postalStates The postal code
     */
    protected $postalStates = [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'DC' => 'District of Columbia',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming'
    ];

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */

    //--------------------------------------------------------------------------

    /**
     * Convert string-to-boolean type.
     *
     * @param string|bool|int $value The string as boolean
     *
     * @return bool
     */
    public function getBoolean($value): bool
    {
        /**
         * Returns true for: '1', 'true', 'on', 'yes'.
         */
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    //--------------------------------------------------------------------------

    /**
     * Check for SEO Friendly Url.
     *
     * @param string $str The string as SEO URL
     *
     * @return string
     */
    public function seoFriendlyUrl(string $str): string
    {
        /* Make alphanumeric and lowercase (removes all other characters) */
        $str = preg_replace('/[^a-z0-9_\s-]/', '', strtolower($str));

        /* Clean up multiple dashes or whitespaces */
        $str = preg_replace('/[\s-]+/', ' ', $str);

        /* Convert whitespaces and underscore to dash */
        $str = preg_replace('/[\s_]/', '-', $str);

        return $str;
    }

    //--------------------------------------------------------------------------

    /**
     * Digit with commas.
     *
     * @param string $str The string with digits and commas
     *
     * @return string
     */
    public function sanitizeDigitCommas($str): string
    {
        return preg_replace('/[^\d,]+$/', '', $str);
    }

    //--------------------------------------------------------------------------

    /**
     * Return the days of the week.
     *
     * @return array
     */
    public function getWeekdays(): array
    {
        return [
            0 => ['Sun', 'Sunday'],
            1 => ['Mon', 'Monday'],
            2 => ['Tues', 'Tuesday'],
            3 => ['Wed', 'Wednesday'],
            4 => ['Thurs', 'Thursday'],
            5 => ['Fri', 'Friday'],
            6 => ['Sat', 'Saturday']
        ];
    }

    //--------------------------------------------------------------------------

    /**
     * Basic IP validation.
     *
     * @param string $ipAddress The IP Address
     *
     * @return bool
     */
    public function isValidIP($ipAddress): bool
    {
        return (bool) filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE);
    }

    //--------------------------------------------------------------------------

    /**
     * Validate only alphabetic characters.
     *
     * @param string $value The input parameter
     *
     * @return bool
     */
    public function isAlpha($value): bool
    {
        return (bool) preg_match('/^[a-z]+$/i', $value);
    }

    //--------------------------------------------------------------------------

    /**
     * Basic IP4 validation, private and reserved ranges.
     *
     * @param string $ipAddress The IP Address
     *
     * @return bool
     */
    public function isValidIP4(string $ipAddress): bool
    {
        return (bool) filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_RES_RANGE);
    }

    //--------------------------------------------------------------------------

    /**
     * Checking string length, max and minimum.
     *
     * @param string $str The string to check
     * @param int    $min The minimum string size
     * @param int    $max The maximum string size
     *
     * @return bool
     *
     * @api
     */
    public function isValidStringLength($str, $min = null, $max = null): bool
    {
        $len = mb_strlen($str, 'UTF-8');

        return (($min !== null) && ($len >= $min)) || (($max !== null) && ($len <= $max));
    }

    //--------------------------------------------------------------------------

    /**
     * Basic MD5 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * @return bool
     */
    public function isValidMd5(string $hash): bool
    {
        return (bool) preg_match('/^[a-fA-F\d]{32}$/', $hash);
    }

    //--------------------------------------------------------------------------

    /**
     * Validate a postal zipcode.
     *
     * @param string $value The zipcode parameter
     *
     * @return bool
     */
    public function isZipcode($value): bool
    {
        return (bool) preg_match('/^\d{5}(-\d{4})?$/', $value);
    }

    //--------------------------------------------------------------------------

    /**
     * Basic SHA-1 hash validation.
     *
     * @param string $hash The hash to validate
     *
     * @return bool
     */
    public function isValidSHA1(string $hash): bool
    {
        return (bool) preg_match('/^[a-fA-F\d]{40}$/', $hash);
    }

    //--------------------------------------------------------------------------

    /**
     * Validate a URL address.
     *
     * @param string $value The URL parameter
     *
     * @return bool
     */
    public function isValidURL(string $value): bool
    {
        return (bool) filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the file extention.
     *
     * @param string $filename The file name
     *
     * @return string
     */
    public function getFileExtension(string $filename): string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }

    //--------------------------------------------------------------------------

    /**
     * Return the months of the year.
     *
     * @return array
     */
    public function getCalendarMonths(): array
    {
        return [
            1 => ['Jan', 'January'],
            2 => ['Feb', 'February'],
            3 => ['Mar', 'March'],
            4 => ['Apr', 'April'],
            5 => ['May', 'May'],
            6 => ['June', 'June'],
            7 => ['July', 'July'],
            8 => ['Aug', 'August'],
            9 => ['Sept', 'September'],
            10 => ['Oct', 'October'],
            11 => ['Nov', 'November'],
            12 => ['Dec', 'December']
        ];
    }

    //--------------------------------------------------------------------------

    /**
     * PHP Version check.
     *
     * @return bool
     */
    public static function isMinimumPHPVersion(): bool
    {
        return (bool) version_compare(PHP_VERSION, static::FRAMEWORK_MINIMUM_PHP, '>=');
    }

    //--------------------------------------------------------------------------

    /**
     * Clean curly quotes (Replace UTF-8, Windows-1252 curly quotes characters).
     *
     * Replace all instances of smart quotes, the en dash, em dash, and
     * ellipsis with straight quotes, one or two dashes, or three dots.
     *
     * @param string $str The string to strip curly quotes
     *
     * @return string
     *
     * @api
     */
    public function cleanCurlies(string $str): string
    {
        $curlyQuotes = [
            'UTF8' => ["\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6"],
            "Windows1252" => [chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133)],
            "clean" => ["'", "'", '"', '"', '-', '--', '...']
        ];

        return str_replace(
            [
                $curlyQuotes['UTF8'],
                $curlyQuotes['Windows1252']
            ],
            [
                $curlyQuotes['clean'],
                $curlyQuotes['clean']
            ],
            $str
        );
    }

    //--------------------------------------------------------------------------

    /**
     * Validate only alphabetic numeric characters.
     *
     * @param string|int $value The input parameter
     *
     * @return bool
     */
    public function isAlphaNumeric($value): bool
    {
        return (bool) preg_match('/^[a-z\d]+$/i', $value);
    }

    //--------------------------------------------------------------------------

    /**
     * Applies a given callback to every value of an array
     * and returns the results as a new array.
     *
     * @param array $array The associated array
     *
     * @return array
     *
     * @api
     */
    public function trimArray(array $array): array
    {
        return (array_map('trim', $array));
    }

    //--------------------------------------------------------------------------

    /**
     * Basic IP4 validation; exclude private range.
     *
     * @param string $ipAddress The IP Address
     *
     * @return bool
     */
    public function isValidIP4NoPrivate(string $ipAddress): bool
    {
        return (bool) filter_var(
            $ipAddress,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV4
            | FILTER_FLAG_NO_PRIV_RANGE
            | FILTER_FLAG_NO_RES_RANGE
        );
    }

    //--------------------------------------------------------------------------

    /**
     * Basic IP6 validation, private and reserved ranges.
     *
     * @param string $ipAddress The IP Address
     *
     * @return bool
     */
    public function isValidIP6NoPrivate(string $ipAddress): bool
    {
        return (bool) filter_var(
            $ipAddress,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_IPV6
            | FILTER_FLAG_NO_PRIV_RANGE
            | FILTER_FLAG_NO_RES_RANGE
        );
    }

    //--------------------------------------------------------------------------

    /**
     * utf8_compliant().
     *
     * Test whether a string complies as UTF-8. This will be much faster than
     * utf8_is_valid but will pass five and six octet UTF-8 sequences, which
     * are not supported by Unicode and so cannot be displayed correctly in
     * a browser. In other words it is not as strict as utf8_is_valid but
     * it's faster. If you use is to validate user input, you place yourself
     * at the risk that attackers will be able to inject 5 and 6 byte sequences
     * (which may or may not be a significant risk, depending on your application)
     *
     * @param string $str The UTF-8 string to check
     *
     * @return bool true if string is valid UTF-8
     */
    public function utf8Compliant($str = null): string
    {
        if (0 === mb_strlen($str, 'UTF-8')) {
            return true;
        }

        /**
         * If even the first character can be matched, when the /u modifier is used,
         * then it's valid UTF-8. If the UTF-8 is somehow invalid, nothing at all
         * will match, even if the string contains some valid sequences.
         */
        return (1 === preg_match('/^.{1}/us', $str));
    }

    //--------------------------------------------------------------------------

    /**
     * Validation Postal State Address.
     *
     * @param string $value The state abbreviation whitelist (e.g., CA, AZ, TX)
     *
     * @return bool
     */
    public function isPostalState(string $value): bool
    {
        return (bool) (in_array(strtoupper(trim($value)), array_keys($this->postalStates)) !== false);
    }

    //--------------------------------------------------------------------------

    /**
     * Check the format and the validity of a date.
     *
     * @param string $datetime The date or timestamp
     * @param string $format   The format
     *
     * @return bool
     *
     * @api
     */
    public function isValidDate($datetime, string $format = 'Y-m-d H:i:s'): bool
    {
        $dateType = DateTime::createFromFormat($format, $datetime);
        return (bool) ($dateType && $dateType->format($format) === $datetime);
    }

    //--------------------------------------------------------------------------

    /**
     * Generate a hash file name.
     *
     * @param string $filename  The file name or key
     * @param string $extension The file extension
     *
     * @return string The hash filename
     *
     * @api
     */
    public function createHashFileName(string $filename, string $extension = '.php'): string
    {
        return sprintf('%s%s', hash('sha256', $filename, false), $extension);
    }

    //--------------------------------------------------------------------------

    /**
     * Sanitize alphanumeric string.
     *
     * @param string|int $str The string to filter
     *
     * @return string
     *
     * @api
     */
    public function sanitizeAlphaNumeric($str): string
    {
        return preg_replace('/[^a-z\d]/i', '', $str);
    }

    //--------------------------------------------------------------------------

    /**
     * Remove all characters except numbers.
     *
     * @param string|int $str The input string
     *
     * @return string
     */
    public function stripNonNumeric($str): string
    {
        return preg_replace('/[^0-9]/', '', $str);
    }

    //--------------------------------------------------------------------------

    /**
     * Remove all characters except letters.
     *
     * @param string $str The input string
     *
     * @return string
     */
    public function stripNonAlpha($str): string
    {
        return preg_replace('/[^a-z]/i', '', $str);
    }

    //--------------------------------------------------------------------------

    /**
     * Transform two or more spaces into just one space.
     *
     * @param string $str The input string
     *
     * @return string
     */
    public function stripExcessWhitespace($str): string
    {
        return preg_replace('/  +/', ' ', $str);
    }

    //--------------------------------------------------------------------------

    /**
     * Validate a valid MAC Address (LAN/network).
     *
     * @throws \InvalidArgumentException on non string value for $str
     * @param string $str The MAC address
     *
     * @return bool
     */
    public function isValidMacAddress(string $str): bool
    {
        return (bool) (preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $str) === 1);
    }

    //--------------------------------------------------------------------------

    /**
     * Return a current MySQL timestamp.
     *
     * @return string The MySQL datetime (e.g., 2017-02-05 07:09:00)
     */
    public function getMySQLTimestamp(): string
    {
        return Carbon::now();
    }

    //--------------------------------------------------------------------------
}
