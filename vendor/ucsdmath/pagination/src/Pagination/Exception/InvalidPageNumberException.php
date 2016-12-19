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

namespace UCSDMath\Pagination\Exception;

use InvalidArgumentException;

/**
 * InvalidPageNumberException is the default implementation of {@link InvalidArgumentException} which
 * provides routine Pagination Exception methods that are commonly used in the framework.
 *
 * {@link Pagination} is basically a helper in the process of dividing a document view into
 * discrete pages.  This provides some Exception handling.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) PersistenceInterface __construct();
 * (+) void __destruct();
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
class InvalidPageNumberException extends \InvalidArgumentException
{
}
