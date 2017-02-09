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
 * Functions is the default implementation of {@link FunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link AbstractFunctions} is basically a base class for various Function routines
 * which this class extends.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) FunctionsInterface __construct();
 * (+) void __destruct();
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
class Functions extends AbstractFunctions implements FunctionsInterface
{
    /**
     * Constants.
     *
     * @var string VERSION The version number
     *
     * @api
     */
    const VERSION = '1.13.0';

    //--------------------------------------------------------------------------

    /**
     * Properties.
     */

    //--------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
        parent::__construct();
    }

    //--------------------------------------------------------------------------

    /**
     * Destructor.
     *
     * @api
     */
    public function __destruct()
    {
        parent::__destruct();
    }

    //--------------------------------------------------------------------------
}
