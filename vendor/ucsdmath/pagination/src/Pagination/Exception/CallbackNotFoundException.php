<?php

/*
 * This file is part of the UCSDMath package.
 *
 * (c) 2015-2016 UCSD Mathematics | Math Computing Support <mathhelp@math.ucsd.edu>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace UCSDMath\Pagination\Exception;

use RuntimeException;

/**
 * CallbackNotFoundException is the default implementation of {@link RuntimeException} which
 * provides routine CallbackNotFoundException methods that are commonly used in the framework.
 *
 * {@link AbstractEncryption} is basically a base class for various RuntimeException requirements
 * which this class extends.  This is for Pagination.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) RuntimeException __construct();
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
class CallbackNotFoundException extends RuntimeException
{

//--------------------------------------------------------------------------
}
