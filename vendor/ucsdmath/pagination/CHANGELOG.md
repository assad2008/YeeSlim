## CHANGELOG
============

All notable changes to `UCSDMath\Pagination` (bug and security fixes) will
be documented in this file.

### 1.10.0 (2016-10-20)

 - Update to jQuery (v3.1.1)
 - Update to Symfony (v3.1.5)
 - Update to Hashids (v1.1.1)
 - Update to Moment (v2.15.1)
 - Update to Phpunit (v5.6.1)
 - Update to TinyMCE (v4.4.3)
 - Update to RequireJS (2.3.2)
 - Update to Monolog (v1.21.0)
 - Update to jQuery-UI (v1.12.1)
 - Update to twig/twig (v1.26.1)
 - Update to league/csv (v8.1.1)
 - Update to doctrine/dbal (v2.5.5)
 - Update to league/flysystem (v1.0.32)
 - Update to respect/validation (v1.1.9)
 - Added new library: Lodash (v4.16.4)
 - Added new library: sprintf.js (v1.0.3)
 - Update to phpseclib/phpseclib (v2.0.4)
 - Update to jQuery-Circle-Progress (v1.2.0)
 - Update to league/flysystem-sftp (v1.0.12)
 - Update to tablesorter jQuery plugin (v2.27.8)
 - Update CSS framework (ucsdmath-main.min.css)
 - Update JS framework (ucsdmath-framework.min.js)
 - Added PHP 7.1 checks through Travis CI - everything passing/in-green
 - Fixed many bugs/security on: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - Adding new JavaScript repository: ucsdmath-js (43 new functions, 32 classes)
     Project ECMAScript 6 Class Additions:
       (*) AjaxManager
       (*) AppointmentDiaryCollection
       (*) Configuration
       (*) ContactCollection
       (*) CoursePetitionsCollection
       (*) CronSchedulerCollection
       (*) Database
       (*) Date
       (*) DependencyInjection
       (*) Encryption
       (*) FacultyProfilesCollection
       (*) FacultySalariesCollection
       (*) FormManager
       (*) Functions
       (*) Image
       (*) InventoryCollection
       (*) Logger
       (*) Mail
       (*) MaillistCollection
       (*) OfficeHoursCollection
       (*) OmnilockCollection
       (*) PersonnelCollection
       (*) PragmaticCollection
       (*) PunchcardCollection
       (*) QuickDexCollection
       (*) Serialization
       (*) SimpleVoterCollection
       (*) SystemUserSettingsCollection
       (*) TaAssignmentsCollection
       (*) TemplateFactory
       (*) Testing
       (*) Validation
     Project Class Methods added:
       (+) {string} sprintf();
       (+) {string} getUuid4();
       (+) {string} getVersion();
       (+) {string} showType(mixed obj);
       (+) {string} getClassName(object obj);
       (+) {string} left(string str, int n);
       (+) {string} right(string str, int n);
       (+) {Array}  array_values(string list);
       (+) {string} sanitizePersonalName(string name);
       (+) {Array}  array_merge(array one, array two, ...);
       (+) {bool}   array_key_exists(string key, array list);
       (+) {string} formatOmnilockFirstname(string lastname);
       (+) {string} rightPad(string str, string char, int n);
       (+) {string} leftPad(string str, string char, int n);
       (+) {bool}   in_array(needle, haystack, paramStrict = false);
       (+) {Array}  explode(string delimiter, string input, int limit);
       (+) {string} formatAid(string aid, string format = '#########');
       (+) {string} formatEid(string eid, string format = '#########');
       (+) {string} formatPid(string pid, string format = 'A########');
       (+) {string} formatOmnilockCredentialRecord(array credentialData);
       (+) {string} formatPhone(string phone, string mask = '(###) ###-####');
       (+) {string} formatOmnilockLastnameGroup(string primaryGroup, string lastname);
       (+) {Array}  array_keys(array array, string searchValue = null, bool paramStrict = false);
       (+) {string} formatOmnilockCredentialNumber(string primaryGroup, string eid, string pid, string aid);
     Project Functions added (in Workshop):
       (+) {string} showType(mixed obj);
       (+) {Array}  isValidHex(string data);
       (+) {bool}   isNumeric(mixed number);
       (+) {bool}   isValidMd5(string hash);
       (+) {string} textReverse(string str);
       (+) {bool}   isValidMathId(string id);
       (+) {bool}   isValidSHA1(string hash);
       (+) {bool}   isValidUuid(string uuid);
       (+) {bool}   isValidYear(string year);
       (+) {bool}   isValidUuid4(string uuid);
       (+) {bool}   isValidSHA512(string hash);
       (+) {bool}   isValidURL(string address);
       (+) {Array}  isValidBase64(string data);
       (+) {bool}   isValidZipcode(string data);
       (+) {Array}  hasHtmlCode(string htmlData);
       (+) {Array}  isValidEmail(string address);
       (+) {bool}   isValidIpAddress(string address);
       (+) {bool}   isValidMacAddress(string address);
       (+) {Array}  arrayPush(array array, array values);

### 1.9.0 (2016-08-21)

 - Update to Phpunit (v5.5.2)
 - Fixed `UCSDMath\Pdf` setFooter() due to changes in mPDF
 - Update `UCSDMath\Session` no longer uses superglobal variable
 - Update `UCSDMath\Passport` to use session via `NamespacedAttributeBag`
 - Update `UCSDMath\Session` to use session via `NamespacedAttributeBag`
 - Update `UCSDMath\Session` to work in a namespace enviroment under `UCSDMath`
 - Update `UCSDMath\Mail` features were greatly improved
 - Added use of PNotify (v3.0.0)
 - Fixed issue with .htaccess for directory name schemes and `UCSDMath\Asset` cache busting
 - Fixed javascript pagination/search state properties for directory list view
 - Fixed many bugs/security issues with use of: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - All dependencies are up-to-date/verified through VersionEye.

### 1.8.0 (2016-07-31)

 - Update to jQuery (v3.1.0)
 - Update to Bootstrap (v3.3.7)
 - Update to jQuery-UI (v1.12.0)
 - Update to Moment (v2.14.1)
 - Update to UCSD-Decorator (v4.5.4)
 - Update to Tiny-MCE (v4.4.1)
 - Update to Hashids (v1.1.0) js
 - Update to Symfony (v3.1.3)
 - Update to Phpunit (v5.4.8)
 - Improved many features/refactoring `UCSDMath\TemplateFactory`
 - Fixed many major and minor bugs
 - Improved many clearing component checks with Scrutinizer
 - Improved many clearing component checks with SensioLabsInsight
 - Improved many methods using `PHP 7` return types
 - The minor step to stable is to add updated feature of theme using new UCSD Decorator 4.5.4 (latest as of date).
 - Fixed many bugs/security on: Scrutinizer CI, Travis CI, Code Climate, SensioLabsInsight, and Codacy.
 - All dependencies are up-to-date/verified through VersionEye.

### 1.7.0 (2016-07-03)

 - Update to jQuery (v2.2.4)
 - Update to jQuery-Timepicker-Addon (v1.6.3)
 - Update to Moment (v2.13.0)
 - Update to Count-Up (v1.7.1)
 - Update to UCSD-Decorator (v4.5.3)
 - Update to RequireJS (v2.2.0)
 - Update to Tiny-MCE (v4.4.0)
 - Update to Monolog (v1.20.0)
 - Update to Symfony (v3.1.2)
 - Initial Release of `UCSDMath\Asset`
 - Initial Release of `UCSDMath\Cache`
 - Initial Release of `UCSDMath\Passport`
 - Improved many features/refactoring `UCSDMath\Database`
 - Improved many features/refactoring `UCSDMath\DependencyInjection`
 - Improved many features/refactoring `UCSDMath\Framework`
 - Improved many features/refactoring `UCSDMath\Functions`
 - Improved many features/refactoring `UCSDMath\TemplateFactory`
 - Fixed many major and minor bugs
 - Improved many clearing component checks with Scrutinizer
 - Improved many clearing component checks with SensioLabsInsight
 - Improved many methods using `PHP 7` return types

### 1.6.0 (2016-02-19)

 - Now converted to `PHP 7` Strict Type; use return types, scalar hints, and random_bytes();
 - Update jQuery to `v2.2.0`
 - Update Moment to `v2.11.1`
 - Update Tiny MCE to `v4.3.4`
 - Added Modernizr `v3.2.0`
 - Update HTML5 Boilerplate to `v5.3.0` (for minor changes to UCSD Decorator 4)
 - Initial Release of `UCSDMath\Mail`
 - Initial Release of `UCSDMath\Omnilock`
 - Initial Release of `UCSDMath\FileManager`
 - Initial Release of `UCSDMath\Annotations`
 - Initial Release of `UCSDMath\FormManager`
 - Initial Release of `UCSDMath\CronScheduler`
 - Initial Release of `UCSDMath\Date`
 - Initial Release of `UCSDMath\Storage`
 - Initial Release of `UCSDMath\Maillist`
 - Initial Release of `UCSDMath\Mail`
 - Fixed minor changes to `UCSDMath\DepartmentSpecificFunctions` adding `Carbon\Carbon`

### 1.5.0 (2015-12-05)

 - Update minor changes to `UCSDMath\DependencyInjection`
 - Update minor SQL fixes
 - Update coding changes anticipation of PHP7
 - Update dependency to Symfony 3.0 (removed all 2.x)
 - Fixed Github commits for Mac OS X line-endings to Unix
 - Update minor formatting and comments
 - Added minor changes to ready PHP7 phase
 - Various JavaScript updates

### 1.4.0 (2015-10-12)

 - Update DDL database schema for system_logs, office_hours, ta_assignments
 - Update comments to Entity and Maps for use with Persistance class.
 - Various javascript updates
 - Added multiple validation methods found in Validation class
 - Corrected and updated method in Pagination
 - other items were done...

### 1.3.0 (2015-09-29)

 - New use of ORM and class called Persistence
 - Created 38 new Entity and maps for testing database tables.
 - Added Doctrine ORM and connections using ConfigurationVault
 - Javascript updates
 - Update some logging output for various applications

### 1.2.0 (2015-09-10)

 - Update core javascript
 - Added boolean AND as default for word spacing all applications
 - Update AbstractDatabase to work with DDL/SQL Updates
 - Structural updates various

### 1.1.0 (2015-08-07)

 - Update core javascript
 - Added boolean AND as default for word spacing
 - Added new class component Pagination
 - Minor configuration changes

### 1.0.5 (2015-07-25)

 - Initial Release of `UCSDMath\Pagination`
 - Initial Release version starts at v1.0.5 as introduced to the framework
