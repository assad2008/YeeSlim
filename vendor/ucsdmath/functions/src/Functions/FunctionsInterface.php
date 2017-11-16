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
 * FunctionsInterface is the interface implemented by all Functions classes.
 *
 * Method list: (+) @api.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
interface FunctionsInterface
{
    /**
     * Constants.
     *
     * @var string FRAMEWORK_MINIMUM_PHP The framework's minimum supported PHP version
     * @var string DEFAULT_CHARSET       The character encoding for the system
     * @var string CRLF                  The carriage return line feed
     * @var bool   REQUIRE_HTTPS         The secure setting TLS/SSL site requirement
     * @var string DEFAULT_TIMEZONE      The local timezone for the server (or set in ini.php)
     * @var string VALID_UUID_PATTERN    The valid UUID v4 regex pattern (Universally Unique Identifier)
     * @var string DEFAULT_LINE          The HTML line charater type used in department functions
     */
    public const FRAMEWORK_MINIMUM_PHP = '7.1.0';
    public const DEFAULT_CHARSET       = 'UTF-8';
    public const CRLF                  = "\r\n";
    public const REQUIRE_HTTPS         = true;
    public const DEFAULT_TIMEZONE      = 'America/Los_Angeles';
    public const VALID_UUID_PATTERN    = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
    public const DEFAULT_LINE          = '&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;&#9472;';

    //--------------------------------------------------------------------------
}
