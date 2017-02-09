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

use UCSDMath\Configuration\Config;
use UCSDMath\Filesystem\FilesystemInterface;
use UCSDMath\DependencyInjection\ServiceRequestContainer;
use UCSDMath\Functions\ExtendedOperations\ValidityFunctions;
use UCSDMath\Functions\ExtendedOperations\EasterEggFunctions;
use UCSDMath\Functions\ExtendedOperations\DepartmentFunctions;
use UCSDMath\Functions\ExtendedOperations\GeneralFunctionMethods;
use UCSDMath\Functions\ExtendedOperations\ValidityFunctionsInterface;
use UCSDMath\Functions\ExtendedOperations\DepartmentExtendedFunctions;
use UCSDMath\Functions\ExtendedOperations\EasterEggFunctionsInterface;
use UCSDMath\Functions\ExtendedOperations\DepartmentFunctionsInterface;
use UCSDMath\Functions\ExtendedOperations\GeneralFunctionMethodsInterface;
use UCSDMath\Functions\ExtendedOperations\DepartmentExtendedFunctionsInterface;

/**
 * AbstractFunctions provides an abstract base class implementation of {@link FunctionsInterface}.
 * This service groups a common code base implementation that Functions extends.
 *
 * This component library is used to service common routines not found in other services.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) FunctionsInterface __construct();
 * (+) void __destruct();
 * (+) bool parameterTypeCheck($param, string $type = 'string');
 * (+) bool arrayKeyExistsRecursive(string $needle, array $haystack);
 * (+) bool arrayKeyExistsRecursiveExtended(string $needle, array $haystack);
 * (+) string getTitledItem(string $str, string $item = null, string $delimiter = ';');
 * (-) FunctionsInterface sftpUploadFile();
 * (-) FunctionsInterface sftpRecordFileSizes();
 * (-) FunctionsInterface sftpCompareFileSizes();
 * (-) FunctionsInterface sftpTransport(ServiceRequestContainer $service, string $account);
 * (-) FunctionsInterface setLocalCache(FilesystemInterface $filesystem, string $absoluteFilePath, $content);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractFunctions implements FunctionsInterface, ServiceFunctionsInterface, DepartmentFunctionsInterface
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
     *
     * @static FunctionsInterface $instance        The static instance FunctionsInterface
     * @static int                $objectCount     The static count of FunctionsInterface
     * @var    array              $storageRegister The stored set of data structures used by this class
     */
    protected $reflectionClass     = null;
    protected $reflectionMethod    = null;
    protected $reflectionException = null;
    protected $floorLabel          = [
        'AP&M B402' => '<optgroup label="Basement Floor">',
        'AP&M 2313' => '</optgroup><optgroup label="2nd Floor">',
        'AP&M 5016' => '</optgroup><optgroup label="5th Floor">',
        'AP&M 6016' => '</optgroup><optgroup label="6th Floor">',
        'AP&M 7016' => '</optgroup><optgroup label="7th Floor">'
    ];
    protected static $instance     = null;
    protected static $objectCount  = 0;
    protected $storageRegister     = [];

    //--------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @api
     */
    public function __construct()
    {
    }

    //--------------------------------------------------------------------------

    /**
     * Destructor.
     *
     * @api
     */
    public function __destruct()
    {
        static::$objectCount--;
    }

    //--------------------------------------------------------------------------

    /**
     * Parameter type check.
     *
     * @param mixed  $param The input parameter
     * @param string $type  The type of parameter [bool, float, int, string, array, object]
     *
     * @return bool
     *
     * @api
     */
    public function parameterTypeCheck($param, string $type = 'string'): bool
    {
        $type = 'is_'.$type;

        return (bool) ($type($param) && ! empty($param));
    }

    //--------------------------------------------------------------------------

    /**
     * Recursive version of array_key_exists.
     *
     * The PHP funcction 'array_key_exists' does NOT work recursively, so this
     * can be used to find a key nested in a multidimensional array.
     * Another option is to use the 'array_walk_recursive' function since PHP 5.3.
     *
     * @param string $needle   The search string
     * @param array  $haystack The space indented setting
     *
     * @return bool The set of formatted <link> stylesheet tags
     *
     * @api
     */
    public function arrayKeyExistsRecursive(string $needle, array $haystack): bool
    {
        $result = array_key_exists($needle, $haystack);
        if (true === $result) {
            return $result;
        }
        $this->arrayKeyExistsRecursiveExtended($needle, $haystack);

        return $result;
    }

    //--------------------------------------------------------------------------

    /**
     * Recursive version extended sub-function.
     *
     * @param string $needle   The search string
     * @param array  $haystack The space indented setting
     *
     * @return bool
     *
     * @api
     */
    public function arrayKeyExistsRecursiveExtended(string $needle, array $haystack): bool
    {
        $result = false;
        foreach ($haystack as $value) {
            if (true === is_array($value)) {
                $result = $this->arrayKeyExistsRecursive($needle, $value);
            }
            if (true === $result) {
                return $result;
            }
        }

        return $result;
    }

    //--------------------------------------------------------------------------

    /**
     * A parser for title delimited data.
     *
     * @param string $str       The string data used to parse
     * @param string $item      The defined title item to find
     * @param string $delimiter The default ending delimiter
     *
     * @return string
     *
     * @api
     */
    public function getTitledItem(string $str, string $item = null, string $delimiter = ';'): string
    {
        return (null === $item)
            ? trim(substr(trim(substr($str, 0)), 0, $this->getStringPositionX(trim(substr($str, 0)), $delimiter, 1)))
            : trim(substr(trim(substr($str, $this->getStringPositionX($str, $item, 1) + strlen($item))), 0, $this->getStringPositionX(trim(substr($str, $this->getStringPositionX($str, $item, 1) + strlen($item))), $delimiter, 1)));
    }

    //--------------------------------------------------------------------------

    /**
     * Upload the file to remote server.
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function sftpUploadFile(): FunctionsInterface
    {
        /* the directory structure on remote host must exist to SFTP */
        if ($this->get('_localFileSize') > 0) {
            $this->get('_sftp')->uploadFile($this->get('_remoteFilePath'), $this->get('_localCacheFilePath'));
        }

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Handling new directory creation.
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function sftpCreateDirectory(): FunctionsInterface
    {
        /* the directory structure on remote host must exist to SFTP */
        if (true === $this->get('_createRemoteDirectory')) {
            (file_exists($this->get('_localCacheFilePath')) && $this->get('_localFileSize') > 0)
                ? $this->get('_sftp')->deleteDirectory($this->get('_remoteDirectoryPath'), true)->createDirectory($this->get('_remoteDirectoryPath'))
                : $this->get('_sftp')->deleteDirectory($this->get('_remoteDirectoryPath'), true);
        }

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Upload the file to remote server.
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function sftpRecordFileSizes(): FunctionsInterface
    {
        $this->set('_remoteFileSize', $this->get('_sftp')->getStat($this->get('_remoteFilePath'))['size']);
        $this->set('filesize_sftp', $this->get('_remoteFileSize'));
        $this->set('filesize_stat', $this->get('_sftp')->getStat($this->get('_remoteFilePath')));
        $this->set('filesize_lstat', $this->get('_sftp')->getLstat($this->get('_remoteFilePath')));

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Upload the file to remote server.
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function sftpCompareFileSizes(): FunctionsInterface
    {
        /* Compare the remote filesize with our local cache copy. */
        if (file_exists($this->get('_localCacheFilePath')) && $this->get('_localFileSize') > 0) {
            $this->get('_remoteFileSize') === $this->get('_localFileSize')
                ? $this->get('_persist')->createSystemLog(sprintf('-- SFTP Upload: successful transfer %s [ %s ]', $this->get('_account'), $this->get('_remoteFilePath')))
                : $this->get('_persist')->createSystemLog(sprintf('-- SFTP Error: failed transfter of cache size %s [ %s ] (Size: %s)', $this->get('_account'), $this->get('_remoteFilePath'), $this->get('_localFileSize')));
        } else {
            $this->get('_persist')->createSystemLog(sprintf('-- Cache Error: Problem creating local cache file %s [ %s ] (Size: %s)', $this->get('_account'), $this->get('_remoteFilePath'), $this->get('_localFileSize')));
        }

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Upload file to remote server.
     *
     * @param ServiceRequestContainer $service The ServiceRequestContainer Instance
     * @param string                  $account The account on remote host for SFTP transfer
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function sftpTransport(ServiceRequestContainer $service, string $account): FunctionsInterface
    {
        $this->set('_account', $account)
                 ->set('_sftp', $service->Sftp)
                     ->set('_persist', $service->Persistence)
                         ->set('_localCacheFilePath', $this->get('localCacheFilePath'))
                             ->set('_remoteFilePath', $service->Database->viewData['remoteFilePath'])
                                 ->set('_remoteDirectoryPath', $service->Database->viewData['remoteDirectoryPath'])
                                     ->set('_createRemoteDirectory', $service->Database->viewData['sftpCreateRemoteDirectory'])
                                         ->set('_accountSettings', $service->ConfigurationVault->openVaultFile('account', $account)->all())
                                             ->set('_localFileSize', (file_exists($this->get('_localCacheFilePath')) ? filesize($this->get('_localCacheFilePath')) : 0));

        $this->get('_sftp')->connect($this->get('_accountSettings'));

        return $this->sftpCreateDirectory()->sftpUploadFile()->sftpRecordFileSizes()->sftpCompareFileSizes();
    }

    //--------------------------------------------------------------------------

    /**
     * Cache a local file to disk.
     *
     * @param FilesystemInterface             $filesystem       The FilesystemInterface
     * @param string                          $absoluteFilePath The absolute file path (e.g., the full unique filename)
     * @param TemplateFactoryInterface|string $content          The TemplateFactory Interface or a string-type
     *
     * @return FunctionsInterface
     *
     * @api
     */
    protected function setLocalCache(FilesystemInterface $filesystem, string $absoluteFilePath, $content): FunctionsInterface
    {
        $this->set(
            'localCacheFilePath',
            $this->get('localCacheDirectory').'/'.
            sha1(Config::APPLICATION_KEY).'/'.
            sha1($absoluteFilePath).'.'.
            $this->getFileExtension($absoluteFilePath)
        );

        $filesystem->write($this->get('localCacheFilePath'), (string) $content);

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
     *
     * Method list: (+) @api, (-) protected or private visibility.
     *
     * (+) array all();
     * (+) object init();
     * (+) string version();
     * (+) bool isString($str);
     * (+) bool has(string $key);
     * (+) string getClassName();
     * (+) int getInstanceCount();
     * (+) array getClassInterfaces();
     * (+) mixed getConst(string $key);
     * (+) bool isValidUuid(string $uuid);
     * (+) bool isValidEmail(string $email);
     * (+) bool isValidSHA512(string $hash);
     * (+) mixed __call($callback, $parameters);
     * (+) bool doesFunctionExist($functionName);
     * (+) bool isStringKey(string $str, array $keys);
     * (+) mixed get(string $key, string $subkey = null);
     * (+) mixed getProperty(string $name, string $key = null);
     * (+) object set(string $key, $value, string $subkey = null);
     * (+) object setProperty(string $name, $value, string $key = null);
     * (-) Exception throwExceptionError(array $error);
     * (-) InvalidArgumentException throwInvalidArgumentExceptionError(array $error);
     */
    use ServiceFunctions;

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
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
     */
    use DepartmentFunctions;

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
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
     */
    use DepartmentExtendedFunctions;

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
     *
     * Method list: (+) @api, (-) protected or private visibility.
     *
     * (+) array getWeekdays();
     * (+) bool isValidIP($ip);
     * (+) bool isAlpha($value);
     * (+) bool isValidIP4($ip);
     * (+) bool isValidIP6($ip);
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
     * (+) bool isValidIP4NoPrivate($ip);
     * (+) bool isValidIP6NoPrivate($ip);
     * (+) string sanitizeAlphaNumeric($str);
     * (+) string getFileExtension($filename);
     * (+) bool utf8Compliant($str = null);
     * (+) string stripExcessWhitespace($str);
     * (+) bool isValidDate($datetime, $format = 'Y-m-d H:i:s');
     * (+) string createHashFileName($filename, $extension = '.php');
     */
    use ValidityFunctions;

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
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
     */
    use GeneralFunctionMethods;

    //--------------------------------------------------------------------------

    /**
     * Method implementations inserted:
     *
     * Method list: (+) @api, (-) protected or private visibility.
     *
     * (+) string getLeflersLaw($number = null);
     */
    use EasterEggFunctions;

    //--------------------------------------------------------------------------
}
