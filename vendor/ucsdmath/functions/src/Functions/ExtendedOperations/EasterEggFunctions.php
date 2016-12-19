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
 * EasterEggFunctions is the default implementation of {@link EasterEggFunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link EasterEggFunctions} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ExtendedOperations\EasterEggFunctions;
 * use UCSDMath\Functions\ExtendedOperations\EasterEggFunctionsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) string getLeflersLaw($number = null);
 *
 * EasterEggFunctions provides a common set of implementations where needed. The EasterEggFunctions
 * trait and the EasterEggFunctionsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait EasterEggFunctions
{
    /**
     * Properties.
     */
    protected $theLaws = [
        1 => "You can only count on yourself.",
        7 => "Never reveal more than you have to.",
        12 => "Execution is nine-tenths of the job.",
        13 => "Give credit where credit is due.",
        17 => "When all else fails, do it yourself.",
        22 => "Never date a co-worker.",
        23 => "Never look back, the obstacles are all ahead.",
        29 => "Always make time for friends.",
        32 => "If life hands you lemonade, don't try to make lemons out of it.",
        36 => "You gotta go with what works.",
        42 => "Any joke that has to be explained isn't worth explaining.",
        43 => "Never underestimate the power of teamwork.",
        46 => "Life isn't always fair.",
        52 => "Never underestimate a man's ability to make you laugh.",
        56 => "A little elbow grease never hurt anyone.",
        65 => "Never second-guess your own work.",
        83 => "Whenever you've eliminated the impossible, whatever remains, however improbable, must be the truth.",
        91 => "Always watch your back.",
        97 => "It always pays to think ahead.",
        98 => "Anything can happen.",
        103 => "A couple of light years can't keep good friends apart.",
        108 => "It's not over until it's over, and sometimes not even then.",
        116 => "When someone is trying to kill you, it's okay to sweat.",
        117 => "Never send a Klingon a Tribble.",
        123 => "If it works perfectly, someone will re-design it.",
        125 => "Getting information out of Zak Kebron is like interrogating a statue."
    ];

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */

    //--------------------------------------------------------------------------

    /**
     * Lefler's Laws.
     *
     * Ensign Robin Lefler was a 24th century Starfleet officer who was stationed on board the USS Enterprise-D in 2368 and
     * became close with Wesley Crusher. Her parents were plasma specialists and moved around very often, so Lefler could
     * neither call a place 'home' nor develop friendships, claiming her first friend had been a tricorder. (TNG: "The Game")
     *
     * Lefler served as mission specialist for a mission exploring the Phoenix Cluster. She had a brief romance with Wesley,
     * and she and Wesley foiled a plot by the Ktarians to take over the Enterprise (and subsequently, Starfleet), using an
     * addictive game to get control over the crew. (TNG: "The Game")
     *
     * Robin created a set of 102 "Laws" to live by. "Every time I learn something essential," she explained, "I make up a law
     * about it, so I never forget." Below are the only laws to be found by Ensign Robin Lefler from an Internet search.
     *
     * @param int $number The specific Lefler Law to return
     *
     * @return string The random law will be returned if out-of-range, non-existent, or none provided
     *
     * @api
     */
    public function getLeflersLaw($number = null): string
    {
        return in_array($number, array_keys($this->theLaws))
            ? $this->theLaws[$number]
            : $this->theLaws[array_rand($this->theLaws, 1)];
    }

    //--------------------------------------------------------------------------
}
