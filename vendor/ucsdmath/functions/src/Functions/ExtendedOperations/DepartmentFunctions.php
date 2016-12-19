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

use Carbon\Carbon;

/**
 * DepartmentFunctions is the default implementation of {@link DepartmentFunctionsInterface} which
 * provides routine Functions methods that are commonly used in the framework.
 *
 * {@link DepartmentFunctions} is a trait method implimentation requirement used in this framework.
 * This set is specifically used in Functions classes.
 *
 * use UCSDMath\Functions\ExtendedOperations\DepartmentFunctions;
 * use UCSDMath\Functions\ExtendedOperations\DepartmentFunctionsInterface;
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) array getMathOffices();
 * (+) array getAPMOptGroups();
 * (+) string getCurrentQuarter();
 * (+) array getEducationDegrees();
 * (+) string getOptionsDropIsEditable(array $options);
 * (+) string renderAPMOptionsDrop(array $options, string $selected = null);
 * (+) string renderOptionsDropArray(array $options, string $selected = null);
 * (+) string renderOptionsDrop(array $options, string $selected = null, int $pad = 28);
 * (+) string renderDegreeOptionsDrop(array $options, string $selected = null, int $pad = 28);
 * (-) string renderDegreeOptionsLine(string $selected, int $pad);
 * (-) string renderOptionsDropLine(string $selected = null, int $pad = 28);
 * (-) string renderAPMOptionsSelected(string $key, string $value, string $selected);
 *
 * DepartmentFunctions provides a common set of implementations where needed. The DepartmentFunctions
 * trait and the DepartmentFunctionsInterface should be paired together.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
trait DepartmentFunctions
{
    /**
     * Properties.
     *
     * @var array $offices The array of stored office locations
     */
    protected $offices = [
        'AP&M B402' => 'AP&M B402',
        'AP&M B412' => 'AP&M B412',
        'AP&M B432' => 'AP&M B432',
        'AP&M 2313' => 'AP&M 2313',
        'AP&M 2325' => 'AP&M 2325',
        'AP&M 2402' => 'AP&M 2402',
        'AP&M 2420' => 'AP&M 2420',
        'AP&M 5016' => 'AP&M 5016',
        'AP&M 5018' => 'AP&M 5018',
        'AP&M 5101' => 'AP&M 5101',
        'AP&M 5111' => 'AP&M 5111',
        'AP&M 5121' => 'AP&M 5121',
        'AP&M 5131' => 'AP&M 5131',
        'AP&M 5132' => 'AP&M 5132',
        'AP&M 5141' => 'AP&M 5141',
        'AP&M 5151' => 'AP&M 5151',
        'AP&M 5157' => 'AP&M 5157',
        'AP&M 5161' => 'AP&M 5161',
        'AP&M 5202' => 'AP&M 5202',
        'AP&M 5210' => 'AP&M 5210',
        'AP&M 5218' => 'AP&M 5218',
        'AP&M 5220' => 'AP&M 5220',
        'AP&M 5230' => 'AP&M 5230',
        'AP&M 5240' => 'AP&M 5240',
        'AP&M 5250' => 'AP&M 5250',
        'AP&M 5256' => 'AP&M 5256',
        'AP&M 5260' => 'AP&M 5260',
        'AP&M 5301' => 'AP&M 5301',
        'AP&M 5402' => 'AP&M 5402',
        'AP&M 5412' => 'AP&M 5412',
        'AP&M 5601' => 'AP&M 5601',
        'AP&M 5701' => 'AP&M 5701',
        'AP&M 5702' => 'AP&M 5702',
        'AP&M 5707' => 'AP&M 5707',
        'AP&M 5712' => 'AP&M 5712',
        'AP&M 5715' => 'AP&M 5715',
        'AP&M 5720' => 'AP&M 5720',
        'AP&M 5723' => 'AP&M 5723',
        'AP&M 5731' => 'AP&M 5731',
        'AP&M 5739' => 'AP&M 5739',
        'AP&M 5747' => 'AP&M 5747',
        'AP&M 5748' => 'AP&M 5748',
        'AP&M 5755' => 'AP&M 5755',
        'AP&M 5760' => 'AP&M 5760',
        'AP&M 5763' => 'AP&M 5763',
        'AP&M 5768' => 'AP&M 5768',
        'AP&M 5771' => 'AP&M 5771',
        'AP&M 5801' => 'AP&M 5801',
        'AP&M 5802' => 'AP&M 5802',
        'AP&M 5804' => 'AP&M 5804',
        'AP&M 5808' => 'AP&M 5808',
        'AP&M 5816' => 'AP&M 5816',
        'AP&M 5824' => 'AP&M 5824',
        'AP&M 5829' => 'AP&M 5829',
        'AP&M 5832' => 'AP&M 5832',
        'AP&M 5839' => 'AP&M 5839',
        'AP&M 5840' => 'AP&M 5840',
        'AP&M 5848' => 'AP&M 5848',
        'AP&M 5856' => 'AP&M 5856',
        'AP&M 5864' => 'AP&M 5864',
        'AP&M 5871' => 'AP&M 5871',
        'AP&M 5872' => 'AP&M 5872',
        'AP&M 5880' => 'AP&M 5880',
        'AP&M 5880C' => 'AP&M 5880C',
        'AP&M 6016' => 'AP&M 6016',
        'AP&M 6018' => 'AP&M 6018',
        'AP&M 6101' => 'AP&M 6101',
        'AP&M 6108' => 'AP&M 6108',
        'AP&M 6111' => 'AP&M 6111',
        'AP&M 6121' => 'AP&M 6121',
        'AP&M 6131' => 'AP&M 6131',
        'AP&M 6132' => 'AP&M 6132',
        'AP&M 6141' => 'AP&M 6141',
        'AP&M 6151' => 'AP&M 6151',
        'AP&M 6157' => 'AP&M 6157',
        'AP&M 6161' => 'AP&M 6161',
        'AP&M 6202' => 'AP&M 6202',
        'AP&M 6210' => 'AP&M 6210',
        'AP&M 6218' => 'AP&M 6218',
        'AP&M 6220' => 'AP&M 6220',
        'AP&M 6230' => 'AP&M 6230',
        'AP&M 6240' => 'AP&M 6240',
        'AP&M 6250' => 'AP&M 6250',
        'AP&M 6256' => 'AP&M 6256',
        'AP&M 6260' => 'AP&M 6260',
        'AP&M 6301' => 'AP&M 6301',
        'AP&M 6303' => 'AP&M 6303',
        'AP&M 6305' => 'AP&M 6305',
        'AP&M 6307' => 'AP&M 6307',
        'AP&M 6311' => 'AP&M 6311',
        'AP&M 6321' => 'AP&M 6321',
        'AP&M 6331' => 'AP&M 6331',
        'AP&M 6333' => 'AP&M 6333',
        'AP&M 6341' => 'AP&M 6341',
        'AP&M 6343' => 'AP&M 6343',
        'AP&M 6351' => 'AP&M 6351',
        'AP&M 6353' => 'AP&M 6353',
        'AP&M 6402' => 'AP&M 6402',
        'AP&M 6414' => 'AP&M 6414',
        'AP&M 6422' => 'AP&M 6422',
        'AP&M 6432' => 'AP&M 6432',
        'AP&M 6434' => 'AP&M 6434',
        'AP&M 6436' => 'AP&M 6436',
        'AP&M 6442' => 'AP&M 6442',
        'AP&M 6444' => 'AP&M 6444',
        'AP&M 6446' => 'AP&M 6446',
        'AP&M 6452' => 'AP&M 6452',
        'AP&M 6454' => 'AP&M 6454',
        'AP&M 7016' => 'AP&M 7016',
        'AP&M 7018' => 'AP&M 7018',
        'AP&M 7101' => 'AP&M 7101',
        'AP&M 7108' => 'AP&M 7108',
        'AP&M 7121' => 'AP&M 7121',
        'AP&M 7131' => 'AP&M 7131',
        'AP&M 7132' => 'AP&M 7132',
        'AP&M 7141' => 'AP&M 7141',
        'AP&M 7151' => 'AP&M 7151',
        'AP&M 7157' => 'AP&M 7157',
        'AP&M 7161' => 'AP&M 7161',
        'AP&M 7202' => 'AP&M 7202',
        'AP&M 7210' => 'AP&M 7210',
        'AP&M 7218' => 'AP&M 7218',
        'AP&M 7220' => 'AP&M 7220',
        'AP&M 7230' => 'AP&M 7230',
        'AP&M 7240' => 'AP&M 7240',
        'AP&M 7250' => 'AP&M 7250',
        'AP&M 7256' => 'AP&M 7256',
        'AP&M 7260' => 'AP&M 7260',
        'AP&M 7301' => 'AP&M 7301',
        'AP&M 7313' => 'AP&M 7313',
        'AP&M 7319' => 'AP&M 7319',
        'AP&M 7325' => 'AP&M 7325',
        'AP&M 7331' => 'AP&M 7331',
        'AP&M 7337' => 'AP&M 7337',
        'AP&M 7343' => 'AP&M 7343',
        'AP&M 7349' => 'AP&M 7349',
        'AP&M 7355' => 'AP&M 7355',
        'AP&M 7356' => 'AP&M 7356',
        'AP&M 7402' => 'AP&M 7402',
        'AP&M 7408' => 'AP&M 7408',
        'AP&M 7409' => 'AP&M 7409',
        'AP&M 7414' => 'AP&M 7414',
        'AP&M 7420' => 'AP&M 7420',
        'AP&M 7421' => 'AP&M 7421',
        'AP&M 7426' => 'AP&M 7426',
        'AP&M 7431' => 'AP&M 7431',
        'AP&M 7432' => 'AP&M 7432',
        'AP&M 7437' => 'AP&M 7437',
        'AP&M 7438' => 'AP&M 7438',
        'AP&M 7444' => 'AP&M 7444',
        'AP&M 7450' => 'AP&M 7450',
        'AP&M 7456' => 'AP&M 7456'
    ];

    //--------------------------------------------------------------------------

    /**
     * Abstract Method Requirements.
     */
    abstract public function getSpaces(int $number): string;

    //--------------------------------------------------------------------------

    /**
     * Generate <option> for 'edit' option.
     *
     * @param array $options The selected value list
     *
     * @return string
     *
     * @api
     */
    public function getOptionsDropIsEditable(array $options): string
    {
        return (true === $options['is_editable'])
            ? sprintf('<option value="%s" disabled="disabled">%s</option>%s<option value="%s">%s</option>%s', "-", static::DEFAULT_LINE, "\n", "edit", 'Edit...', "\n")
            : (string) null;
    }

    //--------------------------------------------------------------------------

    /**
     * Generate degree options for <select>.
     *
     * @param array  $options  The set of options for <select>
     * @param string $selected The selected option in the array
     * @param int    $pad      The space indented setting or integer
     *
     * @return string
     *
     * @api
     */
    public function renderDegreeOptionsDrop(array $options, string $selected = null, int $pad = 28): string
    {
        $pad = $this->getSpaces($pad);
        $droplist = renderDegreeOptionsLine($selected, $pad);
        foreach ($options as $key => $value) {
            $droplist .= ($selected === $key)
                ? sprintf('<option value="%s" selected="selected">%s</option>%s%s', $key, htmlentities($value, ENT_HTML5, 'UTF-8'), "\n", $pad)
                : sprintf('<option value="%s">%s</option>%s%s', $key, htmlentities($value, ENT_HTML5, 'UTF-8'), "\n", $pad);
        }

        return trim($droplist);
    }

    //--------------------------------------------------------------------------

    /**
     * Generate degree <option> line.
     *
     * @param string $selected The selected option in the array
     * @param int    $pad      The space indented setting or integer
     *
     * @return string
     *
     * @api
     */
    protected function renderDegreeOptionsLine(string $selected, int $pad): string
    {
        return (! isset($selected) || $selected === "" || $selected === "-")
            ? sprintf('<option value="%s" selected="selected">%s</option>%s%s', '-', '&mdash;', "\n", $this->getSpaces($pad))
            : sprintf('<option value="%s">%s</option>%s%s', '-', '&mdash;', "\n", $this->getSpaces($pad));
    }

    //--------------------------------------------------------------------------

    /**
     * Generate AP&M Offices options for <select>.
     *
     * @param array  $options  The set of options for <select>
     * @param string $selected The selection option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderAPMOptionsDrop(array $options, string $selected = null): string
    {
        $droplist = null;
        $labels = array_keys($this->offices);
        foreach ($options as $key => $value) {
            $droplist .= in_array($key, $labels) ? $value : null;
            $droplist .= $this->renderAPMOptionsSelected($key, $value, $selected);
            $droplist .= ($key === 'AP&M 7456') ? '</optgroup>' : null;
        }

        return $droplist;
    }

    //--------------------------------------------------------------------------

    /**
     * Generate options for <select> via array.
     *
     * {@internal requirement:
     *     (+) string getOptionsDropIsEditable(array $options);
     *     (-) DepartmentFunctionsInterface renderOptionsDropLine(string $selected, int $pad = 28);
     * }
     *
     * @param array  $options  The selected value list array
     * @param string $selected The selected option in the array
     * @param int    $pad      The space indented setting or integer
     *
     * @return string
     *
     * @api
     */
    public function renderOptionsDrop(array $options, string $selected = null, int $pad = 28): string
    {
        $droplist = '';
        $padding = $this->getSpaces($pad);
        foreach ($options['options'] as $key) {
            $theDisplayValue = trim($key) !== '' ? trim($key) : '&nbsp;';
            $droplist .= ('-' === $key)
                ? $this->renderOptionsDropLine($key, $pad)
                : $this->renderOptionsDropSelected($options, $padding, $theDisplayValue, $key, $selected);
        }

        return $droplist . $this->getOptionsDropIsEditable($options);
    }

    //--------------------------------------------------------------------------

    /**
     * Generate options for <select> via array.
     *
     * {@internal requirement:
     *     (+) string getOptionsDropIsEditable(array $options);
     *     (-) DepartmentFunctionsInterface renderOptionsDropLine(string $selected, int $pad = 28);
     * }
     *
     * @param array  $options         The selected value list array
     * @param string $padding         The space padding as string
     * @param string $theDisplayValue The key name that the user selects <option>
     * @param string $key             The key
     * @param string $selected        The selected option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderOptionsDropSelected(array $options, string $padding, $theDisplayValue, $key, string $selected = null): string
    {
        if ($selected === $key) {
            return sprintf('<option value="%s" selected="selected">%s</option>%s%s', $key, $theDisplayValue, "\n", $padding);
        } elseif ((trim((string)$selected) === '') && ($options['default'] === $key)) {
            return sprintf('<option value="%s" selected="selected">%s</option>%s%s', $options['default'], $options['default'], "\n", $padding);
        }
        return sprintf('<option value="%s">%s</option>%s%s', $key, $theDisplayValue, "\n", $padding);
    }

    //--------------------------------------------------------------------------

    /**
     * Generate degree <option> line.
     *
     * {@internal requirement:
     *     (+) string renderOptionsDrop(array $options, string $selected = null, int $pad = 28);
     * }
     *
     * @param string $key The selected option in the array
     * @param int    $pad The space indented setting or integer
     *
     * @return string
     *
     * @api
     */
    protected function renderOptionsDropLine(string $key = null, int $pad = 28): string
    {
        return ($key === "-")
            ? sprintf('<option value="%s" disabled="disabled">%s</option>%s%s', '-', static::DEFAULT_LINE, "\n", $this->getSpaces($pad))
            : sprintf('<option value="%s">%s</option>%s%s', '-', '&mdash;', "\n", $this->getSpaces($pad));
    }

    //--------------------------------------------------------------------------

    /**
     * Generate options for <select> via associative array.
     *
     * @param array  $options  The set of options for <select>
     * @param string $selected The selected option in the array
     *
     * @return string
     *
     * @api
     */
    public function renderOptionsDropArray(array $options, string $selected = null): string
    {
        $droplist = '';
        foreach ($options as $key => $value) {
            $value = 'edit' === strtolower($key) ? 'Edit...' : $value;
            $droplist .= ($key === '-')
                ? sprintf('<option value="%s" disabled="disabled">%s</option>%s', $key, htmlentities($value, ENT_HTML5, 'UTF-8'), "\n")
                : $this->renderAPMOptionsSelected($key, $value, $selected);
        }

        return $droplist;
    }

    //--------------------------------------------------------------------------

    /**
     * Build <options> for selected tags.
     *
     * @param string $key      The set of options for <select>
     * @param string $value    The selection option in the array
     * @param string $selected The selection option in the array
     *
     * @return string
     *
     * @api
     */
    protected function renderAPMOptionsSelected(string $key, string $value, string $selected): string
    {
        return ($key === $selected)
            ? sprintf('<option value="%s" selected="selected">%s</option>%s', $key, htmlentities($value, ENT_HTML5, 'UTF-8'), "\n")
            : sprintf('<option value="%s">%s</option>%s', $key, htmlentities($value, ENT_HTML5, 'UTF-8'), "\n");
    }

    //--------------------------------------------------------------------------

    /**
     * {@inheritdoc}
     */
    public function getCurrentQuarter(): string
    {
        $quarter = [
            1 => 'Winter',
            2 => 'Winter',
            3 => 'Winter',
            4 => 'Spring',
            5 => 'Spring',
            6 => 'Spring',
            7 => 'Summer',
            8 => 'Summer',
            9 => 'Fall',
            10 => 'Fall',
            11 => 'Fall',
            12 => 'Fall'
        ];

        return $quarter[Carbon::now()->month];
    }

    //--------------------------------------------------------------------------

    /**
     * Return math department offices.
     *
     * @return array
     */
    public static function getMathOffices(): array
    {
        return static::offices;
    }

    //--------------------------------------------------------------------------

    /**
     * Return the OptGroup Mapping of AP&M for Mathematics.
     *
     * @return array
     */
    public function getAPMOptGroups(): array
    {
        return [
        'AP&M B402' => 'Basement Floor',
        'AP&M 2313' => '2nd Floor',
        'AP&M 5016' => '5th Floor',
        'AP&M 6016' => '6th Floor',
        'AP&M 7016' => '7th Floor'
        ];
    }

    //--------------------------------------------------------------------------
}
