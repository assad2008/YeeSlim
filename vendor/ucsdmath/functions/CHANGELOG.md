## CHANGELOG
============

All notable changes to `UCSDMath/Functions` (bug, security fixes, and component
updates) will be documented in this file.

### v1.13.0 (2017-02-05)

 - Update to `npm` [(v4.1.2)](https://www.npmjs.com)
 - Update to `TinyMCE` [(v4.5.3)](http://www.tinymce.com/download/download.php)
 - Update to `Node.js` [(v7.5.0)](https://nodejs.org/en/)
 - Update to `Composer` [(v1.3.2)](https://getcomposer.org)
 - Update to `Babel.js` [(v6.22.2)](https://babeljs.io)
 - Update to `React.js` [(v15.4.1)](https://facebook.github.io/react/)
 - Update to `WordPress` [(v4.7.0)](https://wordpress.org)
 - Update to `Webpack.js` [(v2.2.1)](https://webpack.js.org)
 - Update to `tablesorter` jQuery plugin [(v2.28.4)](https://mottie.github.io/tablesorter/docs/)
 - Update to PHP Component: `symfony/yaml` [(v3.2.2)](https://packagist.org/packages/symfony/yaml)
 - Update to PHP Component: `symfony/debug` [(v3.2.2)](https://packagist.org/packages/symfony/debug)
 - Update to PHP Component: `symfony/finder` [(v3.2.2)](https://packagist.org/packages/symfony/finder)
 - Update to PHP Component: `symfony/console` [(v3.2.2)](https://packagist.org/packages/symfony/console)
 - Update to PHP Component: `symfony/process` [(v3.2.2)](https://packagist.org/packages/symfony/process)
 - Update to PHP Component: `symfony/routing` [(v3.2.2)](https://packagist.org/packages/symfony/routing)
 - Update to PHP Component: `symfony/validator` [(v3.2.2)](https://packagist.org/packages/symfony/validator)
 - Update to PHP Component: `symfony/filesystem` [(v3.2.2)](https://packagist.org/packages/symfony/filesystem)
 - Update to PHP Component: `symfony/serializer` [(v3.2.2)](https://packagist.org/packages/symfony/serializer)
 - Update to PHP Component: `symfony/var-dumper` [(v3.2.2)](https://packagist.org/packages/symfony/var-dumper)
 - Update to PHP Component: `symfony/http-kernel` [(v3.2.2)](https://packagist.org/packages/symfony/http-kernel)
 - Update to PHP Component: `symfony/http-foundation` [(v3.2.2)](https://packagist.org/packages/symfony/http-foundation)
 - Update to PHP Component: `symfony/event-dispatcher` [(v3.2.2)](https://packagist.org/packages/symfony/event-dispatcher)
 - Update to PHP Component: `symfony/framework-bundle` [(v3.2.2)](https://packagist.org/packages/symfony/framework-bundle)
 - Update to PHP Component: `twig/twig` [(v2.1.0)](https://packagist.org/packages/twig/twig)
 - Update to PHP Component: `doctrine/dbal` [(v2.5.11)](https://packagist.org/packages/doctrine/dbal)
 - Update to PHP Component: `league/flysystem` [(v1.0.34)](https://packagist.org/packages/league/flysystem)
 - Update to PHP Component: `nesbot/carbon ` [(v1.22.1)](https://packagist.org/packages/nesbot/carbon)
 - Update to PHP Component: `phpunit/phpunit` [(v6.0.5)](https://packagist.org/packages/phpunit/phpunit)
 - Update to PHP Component: `doctrine/common ` [(v2.7.2)](https://packagist.org/packages/doctrine/common)
 - Update to PHP Component: `respect/validation` [(v1.1.11)](https://packagist.org/packages/respect/validation)
 - Update to PHP Component: `ezyang/htmlpurifier ` [(v4.8.0)](https://packagist.org/packages/ezyang/htmlpurifier)
 - Update to PHP Component: `doctrine/collections ` [(v1.4.0)](https://packagist.org/packages/doctrine/collections)
 - Update to PHP Component: `egulias/email-validator` [(v2.1.2)](https://packagist.org/packages/egulias/email-validator)
 - Update to PHP Component: `squizlabs/php_codesniffer` [(v2.8.0)](https://github.com/squizlabs/PHP_CodeSniffer)
 - Update to PHP Component: `mtdowling/cron-expression` [(v1.2.0)](https://packagist.org/packages/mtdowling/cron-expression)
 - Added new PHP Component: `jenssegers/optimus` [(v0.2.2)](https://packagist.org/packages/jenssegers/optimus)

 - Update: `UCSDMath/Filesystem` dependency on `UCSDMath/Functions` has been removed.
 - Update: `UCSDMath/Serialization` dependency on `UCSDMath/Functions` has been removed.
 - Update: `UCSDMath/ConfigurationVault` dependency on `UCSDMath/Functions` has been removed.
 - Update: `UCSDMath/ConfigurationVault` component to now uses OpenSSL, mcrypt_decrypt()/mcrypt_encrypt() have been removed (i.e., Deprecated as of PHPv7.1)

 - Added: `UCSDMath/Testing::Benchmark` allows multiple named instances to be used (thanks to: [Tobias Matthaiou](https://github.com/sd-tm))
 - Added: multiple new routines using OpenSSL for encrypt/decrypt data
 - Added: method provided by [Jarddel Antunes `jarddel`](https://github.com/jarddel) to import PDF pages: importPages(string $filePath)
 - Added: Bulleted Lists, Ordered Lists, Tables (rows, columns), and Insert of Date, and Time Stamps to notes sections of Portal applications.

 - Fix: moving from 1.x to 2.x of Twig found error in  divisibleby() <=> divisible by();

### v1.12.0 (2017-01-02)

 - Update to `npm` [(v4.0.5)] [1]
 - Update to `Moment` [(2.17.1)] [2]
 - Update to `Node.js` [(v7.3.0)] [3]
 - Update to `Lodash` [(v4.17.4)] [4]
 - Update to `Composer` [(v1.3.0)] [5]
 - Update to `WordPress` [(v4.7.0)] [6]
 - Update to `CountUp.js` [(v1.8.1)] [7]
 - Update to `tablesorter` jQuery plugin [(v2.28.3)] [8]
 - Update to PHP Component: `mpdf/mpdf` (v6.1.3) [9]
 - Update to PHP Component: `twig/twig` [(v1.30.0)] [10]
 - Update to PHP Component: `symfony/yaml` [(v3.2.1)] [11]
 - Update to PHP Component: `symfony/finder` [(v3.2.1)] [12]
 - Update to PHP Component: `symfony/routing` [(v3.2.1)] [13]
 - Update to PHP Component: `symfony/process` [(v3.2.1)] [14]
 - Update to PHP Component: `phpunit/phpunit` [(v5.7.5)] [15]
 - Update to PHP Component: `symfony/validator` [(v3.2.1)] [16]
 - Update to PHP Component: `symfony/filesystem` [(v3.2.1)] [17]
 - Update to PHP Component: `symfony/serializer` [(v3.2.1)] [18]
 - Update to PHP Component: `symfony/http-kernel` [(v3.2.1)] [19]
 - Update to PHP Component: `symfony/http-foundation` [(v3.2.1)] [20]
 - Update to PHP Component: `symfony/event-dispatcher` [(v3.2.1)] [21]
 - Update to PHP Component: `symfony/framework-bundle` [(v3.2.1)] [22]
 - Update to PHP Component: `swiftmailer/swiftmailer` [(v5.4.5)] [23]
 - Update to PHP Component: league/flysystem-sftp (v1.0.13) [24]
 - Update to PHP Component: `mockery/mockery` [(v0.9.7)] [25]
 - Update to PHP Component: `hashids/hashids` [(v2.0.3)] [26]
 - Added `Backbone.js` [(v1.3.3)] [27]
 - Removed PHP Component: `doctrine/common` [(v2.7.1)] [28]
 - Added `Snowstorm` javascript theme and snowman png to panel. [(v1.44.20131208)] [29]
 - Notes: All database tables converted to DEFAULT CHARSET=utf8mb4, COLLATE=utf8mb4_unicode_520_ci

[1]: https://www.npmjs.com
[2]: http://momentjs.com
[3]: https://nodejs.org/en/
[4]: https://lodash.com
[5]: https://getcomposer.org
[6]: https://wordpress.org
[7]: http://inorganik.github.io/countUp.js/
[8]: https://mottie.github.io/tablesorter/docs/
[9]: https://mpdf.github.io
[10]: https://packagist.org/packages/twig/twig
[11]: https://packagist.org/packages/symfony/yaml
[12]: https://packagist.org/packages/symfony/finder
[13]: https://packagist.org/packages/symfony/routing
[14]: https://packagist.org/packages/symfony/process
[15]: https://packagist.org/packages/phpunit/phpunit
[16]: https://packagist.org/packages/symfony/validator
[17]: https://packagist.org/packages/symfony/filesystem
[18]: https://packagist.org/packages/symfony/serializer
[19]: https://packagist.org/packages/symfony/http-kernel
[20]: https://packagist.org/packages/symfony/http-foundation
[21]: https://packagist.org/packages/symfony/event-dispatcher
[22]: https://packagist.org/packages/symfony/framework-bundle
[23]: http://swiftmailer.org
[24]: https://packagist.org/packages/league/flysystem-sftp
[25]: https://packagist.org/packages/mockery/mockery
[26]: https://packagist.org/packages/hashids/hashids
[27]: http://backbonejs.org
[28]: http://www.doctrine-project.org
[29]: https://github.com/scottschiller/snowstorm/

### v1.11.0 (2016-12-02)

 - Update to `npm` (v4.0.2)
 - Update to `Moment` [(2.15.2)
 - Update to `Node.js` (v7.2.0)
 - Update to `Lodash` (v4.17.2)
 - Update to `Composer` (v1.2.3)
 - Update to `Babel.js` (v6.19.0)
 - Update to `React.js` (v15.4.1)
 - Update to `WordPress` (v4.6.1)
 - Update to `Font-Awesome` (v4.7.0)
 - Update to `ucsdmath/ucsdmath-js` (v1.11.0)
 - Update to PHP Component: `league/csv` (v8.1.2)
 - Update to PHP Component: `twig/twig` (v1.28.2)
 - Update to PHP Component: `symfony/yaml` (v3.2.0)
 - Update to PHP Component: `symfony/finder` (v3.2.0)
 - Update to PHP Component: `symfony/routing` (v3.2.0)
 - Update to PHP Component: `symfony/validator` (v3.2.0)
 - Update to PHP Component: `symfony/filesystem` (v3.2.0)
 - Update to PHP Component: `symfony/serializer` (v3.2.0)
 - Update to PHP Component: `symfony/http-kernel` (v3.2.0)
 - Update to PHP Component: `symfony/http-foundation` (v3.2.0)
 - Update to PHP Component: `symfony/event-dispatcher` (v3.2.0)
 - Update to PHP Component: `symfony/framework-bundle` (v3.2.0)
 - Update to PHP Component: `doctrine/cache` (v1.6.1)
 - Update to PHP Component: `hashids/hashids` (v2.0.0)
 - Update to PHP Component: `phpunit/phpunit` (v5.7.1)
 - Update to PHP Component: `twig/extensions` (v1.4.1)
 - Update to PHP Component: `respect/validation` (v1.1.10)
 - Added new PHP Component: `doctrine/common` (v2.7.0)
 - Added new PHP Component: `symfony/process` (v3.2.0)
 - Added new PHP Component: `hellogerard/jobby` (v3.2.1)
 - Added new PHP Component: `doctrine/annotations` (v1.3.0)
 - Added new PHP Component: `jeremeamia/SuperClosure` (v2.2.0)
 - Added new PHP Component: `mtdowling/cron-expression` (v1.1.0)
 - Added new PHP 7.x checks through Codeship CI (current status: green/passing)
 - Added multiple 'index.php' files in order to prevent index browsing under mis-configuration issues with Apache.
 - Initial Release of new repository: `UCSDMath/Barcode` (v1.11.0)
 - Convert MySQL tables to full Unicode support - converted from 'utf8' to 'utf8mb4/utf8mb4_unicode_ci'.

    Split repository `ucsdmath/ucsdmath-js` into smaller components on Github:
    - Added new Javascript repository (Github): `ucsdmath/html-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/mail-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/logger-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/testing-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/workshop-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/functions-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/encryption-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/validation-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/ajax-manager-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/form-manager-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/configuration-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/serialization-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/date-component-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/image-component-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/template-factory-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/contact-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/database-component-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/maillist-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/omnilock-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/quickdex-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/dependency-injection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/inventory-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/personnel-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/pragmatic-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/punchcard-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/persistence-component-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/officehours-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/simple-voter-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/taassignments-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/cron-scheduler-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/course-petitions-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/faculty-profiles-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/faculty-salaries-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/appointment-diary-collection-js` (v1.11.0)
    - Added new Javascript repository (Github): `ucsdmath/system-user-settings-collection-js` (v1.11.0)

    Published new packages: https://www.npmjs.com/~ucsdmath
    - Published new Javascript package (npm): `ucsdmath/html-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/mail-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/logger-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/testing-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/ucsdmath-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/workshop-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/functions-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/encryption-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/validation-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/ajax-manager-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/form-manager-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/configuration-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/serialization-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/date-component-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/image-component-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/template-factory-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/contact-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/database-component-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/maillist-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/omnilock-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/quickdex-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/dependency-injection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/inventory-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/personnel-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/pragmatic-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/punchcard-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/persistence-component-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/officehours-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/simple-voter-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/taassignments-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/cron-scheduler-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/course-petitions-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/faculty-profiles-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/faculty-salaries-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/appointment-diary-collection-js` (v1.11.0)
    - Published new Javascript package (npm): `ucsdmath/system-user-settings-collection-js` (v1.11.0)

### v1.10.0 (2016-10-20)

 - Update to `jQuery` (v3.1.1)
 - Update to `Symfony` (v3.1.5)
 - Update to `Hashids` (v1.1.1)
 - Update to `Moment` (v2.15.1)
 - Update to `TinyMCE` (v4.4.3)
 - Update to `RequireJS` (2.3.2)
 - Update to `jQuery-UI` (v1.12.1)
 - Update to `twig/twig` (v1.26.1)
 - Update to `league/csv` (v8.1.1)
 - Update to `doctrine/dbal` (v2.5.5)
 - Update to `phpunit/phpunit` (v5.6.1)
 - Update to `monolog/monolog` (v1.21.0)
 - Update to `league/flysystem` (v1.0.32)
 - Update to `respect/validation` (v1.1.9)
 - Added new library: `Lodash` (v4.16.4)
 - Added new library: `sprintf.js` (v1.0.3)
 - Update to `phpseclib/phpseclib` (v2.0.4)
 - Update to `jQuery-Circle-Progress` (v1.2.0)
 - Update to `league/flysystem-sftp` (v1.0.12)
 - Update to `tablesorter` jQuery plugin (v2.27.8)
 - Update CSS framework (ucsdmath-main.min.css)
 - Update JS framework (ucsdmath-framework.min.js)
 - Added PHP 7.1 checks through Travis CI - everything passing/in-green
 - Fixed many bugs/security on: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - Adding new JavaScript repository: ucsdmath-js (43 new functions, 32 classes)
    Project ECMAScript 6 Class Additions:
    - `ucsdmath/AjaxManager`
    - `ucsdmath/AppointmentDiaryCollection`
    - `ucsdmath/Configuration`
    - `ucsdmath/ContactCollection`
    - `ucsdmath/CoursePetitionsCollection`
    - `ucsdmath/CronSchedulerCollection`
    - `ucsdmath/Database`
    - `ucsdmath/Date`
    - `ucsdmath/DependencyInjection`
    - `ucsdmath/Encryption`
    - `ucsdmath/FacultyProfilesCollection`
    - `ucsdmath/FacultySalariesCollection`
    - `ucsdmath/FormManager`
    - `ucsdmath/Functions`
    - `ucsdmath/Image`
    - `ucsdmath/InventoryCollection`
    - `ucsdmath/Logger`
    - `ucsdmath/Mail`
    - `ucsdmath/MaillistCollection`
    - `ucsdmath/OfficeHoursCollection`
    - `ucsdmath/OmnilockCollection`
    - `ucsdmath/PersonnelCollection`
    - `ucsdmath/PragmaticCollection`
    - `ucsdmath/PunchcardCollection`
    - `ucsdmath/QuickDexCollection`
    - `ucsdmath/Serialization`
    - `ucsdmath/SimpleVoterCollection`
    - `ucsdmath/SystemUserSettingsCollection`
    - `ucsdmath/TaAssignmentsCollection`
    - `ucsdmath/TemplateFactory`
    - `ucsdmath/Testing`
    - `ucsdmath/Validation`
    Project Class Methods added:
    - {string} sprintf();
    - {string} getUuid4();
    - {string} getVersion();
    - {string} showType(mixed obj);
    - {string} getClassName(object obj);
    - {string} left(string str, int n);
    - {string} right(string str, int n);
    - {Array}  array_values(string list);
    - {string} sanitizePersonalName(string name);
    - {Array}  array_merge(array one, array two, ...);
    - {bool}   array_key_exists(string key, array list);
    - {string} formatOmnilockFirstname(string lastname);
    - {string} rightPad(string str, string char, int n);
    - {string} leftPad(string str, string char, int n);
    - {bool}   in_array(needle, haystack, paramStrict = false);
    - {Array}  explode(string delimiter, string input, int limit);
    - {string} formatAid(string aid, string format = '#########');
    - {string} formatEid(string eid, string format = '#########');
    - {string} formatPid(string pid, string format = 'A########');
    - {string} formatOmnilockCredentialRecord(array credentialData);
    - {string} formatPhone(string phone, string mask = '(###) ###-####');
    - {string} formatOmnilockLastnameGroup(string primaryGroup, string lastname);
    - {Array}  array_keys(array array, string searchValue = null, bool paramStrict = false);
    - {string} formatOmnilockCredentialNumber(string primaryGroup, string eid, string pid, string aid);
    Project Functions added (in Workshop):
    - {string} showType(mixed obj);
    - {Array}  isValidHex(string data);
    - {bool}   isNumeric(mixed number);
    - {bool}   isValidMd5(string hash);
    - {string} textReverse(string str);
    - {bool}   isValidMathId(string id);
    - {bool}   isValidSHA1(string hash);
    - {bool}   isValidUuid(string uuid);
    - {bool}   isValidYear(string year);
    - {bool}   isValidUuid4(string uuid);
    - {bool}   isValidSHA512(string hash);
    - {bool}   isValidURL(string address);
    - {Array}  isValidBase64(string data);
    - {bool}   isValidZipcode(string data);
    - {Array}  hasHtmlCode(string htmlData);
    - {Array}  isValidEmail(string address);
    - {bool}   isValidIpAddress(string address);
    - {bool}   isValidMacAddress(string address);
    - {Array}  arrayPush(array array, array values);

### v1.9.0 (2016-08-21)

 - Update to Phpunit (v5.5.2)
 - Fixed `UCSDMath/Pdf` setFooter() due to changes in mPDF
 - Update `UCSDMath/Session` no longer uses superglobal variable
 - Update `UCSDMath/Passport` to use session via `NamespacedAttributeBag`
 - Update `UCSDMath/Session` to use session via `NamespacedAttributeBag`
 - Update `UCSDMath/Session` to work in a namespace enviroment under `UCSDMath`
 - Update `UCSDMath/Mail` features were greatly improved
 - Added use of PNotify (v3.0.0)
 - Fixed issue with .htaccess for directory name schemes and `UCSDMath/Asset` cache busting
 - Fixed javascript pagination/search state properties for directory list view
 - Fixed many bugs/security issues with use of: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - All dependencies are up-to-date/verified through VersionEye.

### v1.8.0 (2016-07-31)

 - Update to jQuery (v3.1.0)
 - Update to Bootstrap (v3.3.7)
 - Update to jQuery-UI (v1.12.0)
 - Update to Moment (v2.14.1)
 - Update to UCSD-Decorator (v4.5.4)
 - Update to Tiny-MCE (v4.4.1)
 - Update to Hashids (v1.1.0) js
 - Update to Symfony (v3.1.3)
 - Update to Phpunit (v5.4.8)
 - Improved many features/refactoring `UCSDMath/TemplateFactory`
 - Fixed many major and minor bugs
 - Improved many clearing component checks with Scrutinizer
 - Improved many clearing component checks with SensioLabsInsight
 - Improved many methods using `PHP 7` return types
 - The minor step to stable is to add updated feature of theme using new UCSD Decorator 4.5.4 (latest as of date).
 - Fixed many bugs/security on: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - All dependencies are up-to-date/verified through VersionEye.

### v1.7.0 (2016-07-03)

 - Update to jQuery (v2.2.4)
 - Update to jQuery-Timepicker-Addon (v1.6.3)
 - Update to Moment (v2.13.0)
 - Update to Count-Up (v1.7.1)
 - Update to UCSD-Decorator (v4.5.3)
 - Update to RequireJS (v2.2.0)
 - Update to Tiny-MCE (v4.4.0)
 - Update to Monolog (v1.20.0)
 - Update to Symfony (v3.1.2)
 - Initial Release of `UCSDMath/Asset`
 - Initial Release of `UCSDMath/Cache`
 - Initial Release of `UCSDMath/Passport`
 - Improved many features/refactoring `UCSDMath/Database`
 - Improved many features/refactoring `UCSDMath/DependencyInjection`
 - Improved many features/refactoring `UCSDMath/Framework`
 - Improved many features/refactoring `UCSDMath/Functions`
 - Improved many features/refactoring `UCSDMath/TemplateFactory`
 - Fixed many major and minor bugs
 - Improved many clearing component checks with Scrutinizer
 - Improved many clearing component checks with SensioLabsInsight
 - Improved many methods using `PHP 7` return types

### v1.6.0 (2016-02-19)

 - Now converted to `PHP 7` Strict Type; use return types, scalar hints, and random_bytes();
 - Update jQuery to `v2.2.0`
 - Update Moment to `v2.11.1`
 - Update Tiny MCE to `v4.3.4`
 - Added Modernizr `v3.2.0`
 - Update HTML5 Boilerplate to `v5.3.0` (for minor changes to UCSD Decorator 4)
 - Initial Release of `UCSDMath/Mail`
 - Initial Release of `UCSDMath/Omnilock`
 - Initial Release of `UCSDMath/FileManager`
 - Initial Release of `UCSDMath/Annotations`
 - Initial Release of `UCSDMath/FormManager`
 - Initial Release of `UCSDMath/CronScheduler`
 - Initial Release of `UCSDMath/Date`
 - Initial Release of `UCSDMath/Storage`
 - Initial Release of `UCSDMath/Maillist`
 - Initial Release of `UCSDMath/Mail`
 - Fixed minor changes to `UCSDMath/DepartmentSpecificFunctions` adding `Carbon\Carbon`

### v1.5.0 (2015-12-05)

 - Update minor changes to `UCSDMath/DependencyInjection`
 - Update minor SQL fixes
 - Update coding changes anticipation of PHP7
 - Update dependency to Symfony 3.0 (removed all 2.x)
 - Fixed Github commits for Mac OS X line-endings to Unix
 - Update minor formatting and comments
 - Added minor changes to ready PHP7 phase
 - Various JavaScript updates

### v1.4.0 (2015-10-12)

 - Update DDL database schema for system_logs, office_hours, ta_assignments
 - Update comments to Entity and Maps for use with Persistance class.
 - Various javascript updates
 - Added multiple validation methods found in Validation class
 - Corrected and updated method in Pagination
 - other items were done...

### v1.3.0 (2015-09-29)

 - New use of ORM and class called Persistence
 - Created 38 new Entity and maps for testing database tables.
 - Added Doctrine ORM and connections using ConfigurationVault
 - Javascript updates
 - Update some logging output for various applications

### v1.2.0 (2015-09-10)

 - Update core javascript
 - Added boolean AND as default for word spacing all applications
 - Update AbstractDatabase to work with DDL/SQL Updates
 - Structural updates various

### v1.1.0 (2015-08-07)

 - Update core javascript
 - Added boolean AND as default for word spacing
 - Added new class component Pagination
 - Minor configuration changes

### v1.0.5 (2015-07-20)

 - Fixed some smaller issues with quick searches
 - Added Booleans AND OR NOT to quick searches
 - now uses full-text search

### v1.0.4 (2015-07-14)

 - Added and updated many methods to Pdf class

### v1.0.3 (2015-07-05)

 - Check for existing autoloader or notify
 - Autoload using absolute system path
 - Removed superglobals $_GET, $_POST, $_SERVER from codebase
 - Added version() to traits file.

### v1.0.2 (2015-06-30)

 - Altered paths to allow local environment.

### v1.0.1 (2015-06-29)

 - Fixed warning on "Ambiguous class resolution" when dumping optimized autoloader

### v1.0.0 (2015-06-29)

 - Initial Release of `UCSDMath/Functions`
