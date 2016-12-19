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
 * DepartmentExtendedFunctions is the default implementation of {@link DepartmentExtendedFunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link DepartmentExtendedFunctions} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ExtendedOperations\DepartmentExtendedFunctions;
 * use UCSDMath\Functions\ExtendedOperations\DepartmentExtendedFunctionsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) string formatOfficeLocation(string $office);
 * (+) string getNumbersOnly(string $filterString);
 * (+) string formatEID(string $employeeID, string $format = '#########');
 * (+) string formatPID(string $personalID, string $format = 'A########');
 * (+) string formatAID(string $affiliateID, string $format = '#########');
 * (+) string formatPhone(string $phone, string $format = '(###) ###-####');
 * (-) string formatPhoneTenDigitMask(string $phone, string $format);
 * (-) string formatPhoneMask(string $phone, int $length, string $format);
 *
 * DepartmentExtendedFunctions provides a common set of implementations where needed. The DepartmentExtendedFunctions
 * trait and the DepartmentExtendedFunctionsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait DepartmentExtendedFunctions
{
    /**
     * Properties.
     */

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */
    abstract public function stripNonNumeric($str): string;

    //--------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted AID number (Emeritus, others).
     *
     * @param string $affiliateID The id number for enforcing a mask
     * @param string $format      The format pattern or mask
     *
     * @return string The formatted UCSD AID number (e.g., 990085225)
     */
    public function formatAID(string $affiliateID, string $format = '#########'): string
    {
        return str_pad($this->stripNonNumeric($affiliateID) * 1, strlen($format), '0', STR_PAD_LEFT);
    }

    //--------------------------------------------------------------------------

    /**
     * Format a phone number to a set mask.
     *
     * @param string $phone  The phone number to format
     * @param string $format The format pattern or mask
     *
     * @return string
     */
    public function formatPhone(string $phone, string $format = '(###) ###-####'): string
    {
        return $this->formatPhoneMask($this->stripNonNumeric($phone), strlen($this->stripNonNumeric($phone)), $format);
    }

    //--------------------------------------------------------------------------

    /**
     * Format phone-to-mask.
     *
     * @param string $phone  The phone number to format
     * @param int    $length The $phone digit length
     * @param string $format The format mask pattern
     *
     * @return string
     */
    protected function formatPhoneMask(string $phone, int $length, string $format): string
    {
        $this->formatPhoneMultiMask($phone, $length, $format);

        return preg_match('/^\(?([2-9]{1}\d{2})\)?[-.\s]?([2-9]{1}\d{2})[-.\s]?(\d{4})$/', $phone)
            ? preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $phone)
            : $phone;
    }

    //--------------------------------------------------------------------------

    /**
     * Return the correct digit masking.
     *
     * @param string $phone  The phone number to format
     * @param int    $length The $phone digit length
     * @param string $format The format mask pattern
     *
     * @return string
     */
    protected function formatPhoneMultiMask(string $phone, int $length, string $format): string
    {
        if (7 === $length && 1 === substr_count($format, '-')) {
            return preg_replace('/([0-9]{3})([0-9]{4})/', '$1-$2', $phone);
        } elseif (10 === $length) {
            return $this->formatPhoneTenDigitMask($phone, $format);
        }
    }

    //--------------------------------------------------------------------------

    /**
     * Format phone with 10-digit mask.
     *
     * @param string $phone  The phone number to format
     * @param string $format The format mask pattern
     *
     * @return string
     */
    protected function formatPhoneTenDigitMask(string $phone, string $format): string
    {
        /* mask: (###) ###-####, ###-###-#### */
        return (1 === substr_count($format, '(###)'))
            ? preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $phone)
            : preg_replace('/([0-9]{3})([0-9]{3})([0-9]{4})/', '$1-$2-$3', $phone);
    }

    //--------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted PID number (Teaching Faculty, Students).
     *
     * @param string $personalID The id number for enforcing a mask
     * @param string $format     The format pattern or mask
     *
     * @return string The formatted UCSD EID number (e.g., A00085225)
     */
    public function formatPID(string $personalID, string $format = 'A########'): string
    {
        $personalID = $this->stripNonNumeric($personalID) * 1;
        $preset     = preg_replace("/[^a-zA-Z]/", '', $format);

        return ($preset.str_pad($personalID, strlen($format) - strlen($preset), '0', STR_PAD_LEFT));
    }

    //--------------------------------------------------------------------------

    /**
     * Returns a UCSD formatted EID number.
     *
     * @param string $employeeID The employee id number
     * @param string $format     The format pattern or mask
     *
     * @return string The formatted UCSD EID number
     */
    public function formatEID(string $employeeID, string $format = '#########'): string
    {
        $employeeID = $this->stripNonNumeric($employeeID) * 1;

        return str_pad($employeeID, strlen($format), '0', STR_PAD_LEFT);
    }

    //--------------------------------------------------------------------------

    /**
     * Return a correctly formatted UCSD office location.
     *
     * {@internal requirement:
     *     (+) string getNumbersOnly(string $filterString);
     * }
     *
     * @param string $office The office location.
     *
     * @return string The formatted office location
     */
    public function formatOfficeLocation(string $office): string
    {
        $office = strtoupper(trim($office));
        $rightAlpha = preg_replace('/[^A-Z]/', '', substr($office, -1));
        $numbersOnly = substr('0000'.($this->getNumbersOnly($office) * 1), -4);

        $numbersOnly = substr($numbersOnly, 0, 2) === '04'
            ? 'B'.substr($numbersOnly, 1, 4)
            : $numbersOnly;

        return ('' === $office || 'NONE' === $office)
            ? 'None'
            : sprintf('%s %s%s', 'AP&M', $numbersOnly, $rightAlpha);
    }

    //--------------------------------------------------------------------------

    /**
     * Returns a string of numbers only.
     *
     * @param string $filterString The string to filter
     *
     * @return string The string of numbers only
     */
    public function getNumbersOnly(string $filterString): string
    {
        return preg_replace('/\D/', '', $filterString);
    }

    //--------------------------------------------------------------------------
}
