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

namespace UCSDMath\Pagination;

/**
 * PaginationInterface is the interface implemented by all Pagination classes.
 *
 * Method list: (+) @api.
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 *
 * @api
 */
interface PaginationInterface
{
    /**
     * Constants.
     *
     * @var string FRAMEWORK_MINIMUM_PHP      The framework's minimum supported PHP version
     * @var string DEFAULT_CHARSET            The character encoding for the system
     * @var string CRLF                       The carriage return line feed
     * @var bool   REQUIRE_HTTPS              The secure setting TLS/SSL site requirement
     * @var string DEFAULT_TIMEZONE           The local timezone for the server (or set in ini.php)
     * @var int    BASE_PAGE                  The base default paging number (int)
     * @var string PLACEHOLDER_PAGE_NUMBER    The placeholder for a current page number
     * @var string PLACEHOLDER_ITEMS_PER_PAGE The placeholder for a items per page
     * @var string PLACEHOLDER_SORT_PATTERN   The placeholder for a sorting pattern
     * @var string PLACEHOLDER_SEARCH_PATTERN The placeholder for a search pattern
     * @var string TITLE_PREV                 The default previous title navigation
     * @var string TITLE_NEXT                 The default next title navigation
     * @var string NAVIGATION_ARROW_PREV      The default previous arrow navigation
     * @var string NAVIGATION_ARROW_NEXT      The default next arrow navigation
     * @var string NAVIGATION_ELLIPSES        The default ellipses in navigation
     */
    public const FRAMEWORK_MINIMUM_PHP      = '7.1.0';
    public const DEFAULT_CHARSET            = 'UTF-8';
    public const CRLF                       = "\r\n";
    public const REQUIRE_HTTPS              = true;
    public const DEFAULT_TIMEZONE           = 'America/Los_Angeles';
    public const BASE_PAGE                  = 1;
    public const PLACEHOLDER_PAGE_NUMBER    = '(:pageNumber)';
    public const PLACEHOLDER_ITEMS_PER_PAGE = '(:itemsPerPage)';
    public const PLACEHOLDER_SORT_PATTERN   = '(:sortPattern)';
    public const PLACEHOLDER_SEARCH_PATTERN = '(:searchPattern)';
    public const TITLE_PREV                 = 'Select the next page';
    public const TITLE_NEXT                 = 'Select the previous page';
    public const NAVIGATION_ARROW_PREV      = '&#10094;&#160;Prev';
    public const NAVIGATION_ARROW_NEXT      = 'Next&#160;&#10095;';
    public const NAVIGATION_ELLIPSES        = '&#183;&#160;&#183;&#160;&#183;';

    //--------------------------------------------------------------------------

    /**
     * Recalculates any updated settings parameter.
     *
     * @param array $settings The list of per page settings.
     *
     * @return PaginationInterface The current interface
     *
     * @throws \InvalidArgumentException if $settings is null.
     *
     * @api
     */
    public function recalculate(array $settings): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the calculated page count.
     *
     * @return int
     *
     * @api
     */
    public function getPageCount(): int;

    //--------------------------------------------------------------------------

    /**
     * Set the maximum pages to display.
     *
     * @param int $maxPagesToShow The number of pages to display.
     *
     * @return PaginationInterface The current interface
     *
     * @throws \InvalidArgumentException if $maxPagesToShow is less than 3.
     *
     * @api
     */
    public function setMaxPagesToShow(int $maxPagesToShow): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the maximum pages to display.
     *
     * @return int
     *
     * @api
     */
    public function getMaxPagesToShow(): int;

    //--------------------------------------------------------------------------

    /**
     * Get the limit per page offset (for SQL LIMIT statement).
     *
     * @return array
     *
     * @api
     */
    public function getLimitPerPageOffset(\Closure $overridePerPageOffset = null, int $newPage = null): array;

    //--------------------------------------------------------------------------

    /**
     * Set the current page number.
     *
     * @param int $currentPageNumber The current page number.
     *
     * @return PaginationInterface The current interface
     *
     * @api
     */
    public function setCurrentPageNumber(int $currentPageNumber = null): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the current page number.
     *
     * @return int
     *
     * @api
     */
    public function getCurrentPageNumber(): int;

    //--------------------------------------------------------------------------

    /**
     * Set the number of items (records) per page.
     *
     * @param int $itemsPerPage The number of items per page
     *
     * @return PaginationInterface The current interface
     *
     * @api
     */
    public function setItemsPerPage(int $itemsPerPage): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the number of items (records) per page.
     *
     * @return int
     *
     * @api
     */
    public function getItemsPerPage();

    //--------------------------------------------------------------------------

    /**
     * Set the total number of records in total.
     *
     * @param int $totalRecordCount The number of total records in database
     *
     * @return PaginationInterface The current interface
     *
     * @api
     */
    public function setTotalRecordCount(int $totalRecordCount): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the number of items in database.
     *
     * @return int
     *
     * @api
     */
    public function getTotalRecordCount(): int;

    //--------------------------------------------------------------------------

    /**
     * Get the number of pages.
     *
     * @return int
     *
     * @api
     */
    public function getNumPages(): int;

    //--------------------------------------------------------------------------

    /**
     * Set the url pattern for rendering pagination (scheme).
     *
     * @param string $urlPattern The base SEO url pattern
     *
     * @return PaginationInterface The current interface
     *
     * @api
     */
    public function setUrlPattern(string $urlPattern): PaginationInterface;

    //--------------------------------------------------------------------------

    /**
     * Get the assigned url pattern.
     *
     * @return string
     *
     * @api
     */
    public function getUrlPattern(): string;

    //--------------------------------------------------------------------------

    /**
     * Get the page url.
     *
     * @param int $pageNumber The page number for the url pattern
     *
     * @return string
     *
     * @api
     */
    public function getPageUrl($pageNumber);

    //--------------------------------------------------------------------------

    /**
     * Get the next page number.
     *
     * @return null|int
     *
     * @api
     */
    public function getNextPage(): ?int;

    //--------------------------------------------------------------------------

    /**
     * Get the previous page number.
     *
     * @return null|int
     *
     * @api
     */
    public function getPrevPage(): ?int;

    //--------------------------------------------------------------------------

    /**
     * Get the next page url.
     *
     * @return null|string
     *
     * @api
     */
    public function getNextUrl(): ?string;

    //--------------------------------------------------------------------------

    /**
     * Get the previous page url.
     *
     * @return null|string
     *
     * @api
     */
    public function getPrevUrl(): ?string;

    //--------------------------------------------------------------------------

    /**
     * Render the pagination via data array.
     *
     * Example:
     *
     * array(
     *     array ('pageNumber' => 1,     'pageUrl' => '/personnel/page-1/',  'isCurrentPage' => false),
     *     array ('pageNumber' => '...', 'pageUrl' => null,                  'isCurrentPage' => false),
     *     array ('pageNumber' => 7,     'pageUrl' => '/personnel/page-7/',  'isCurrentPage' => false),
     *     array ('pageNumber' => 8,     'pageUrl' => '/personnel/page-8/',  'isCurrentPage' => false),
     *     array ('pageNumber' => 9,     'pageUrl' => '/personnel/page-9/',  'isCurrentPage' => true ),
     *     array ('pageNumber' => 10,    'pageUrl' => '/personnel/page-10/', 'isCurrentPage' => false),
     *     array ('pageNumber' => 11,    'pageUrl' => '/personnel/page-11/', 'isCurrentPage' => false),
     *     array ('pageNumber' => '...', 'pageUrl' => null,                  'isCurrentPage' => false),
     *     array ('pageNumber' => 18,    'pageUrl' => '/personnel/page-18/', 'isCurrentPage' => false),
     * );
     *
     * @return array
     *
     * @api
     */
    public function renderAsArray();

    //--------------------------------------------------------------------------

    /**
     * Render a small HTML pagination control.
     *
     * @return string
     *
     * @api
     */
    public function renderCompactPaging();

    //--------------------------------------------------------------------------

    /**
     * Render a long HTML pagination control.
     *
     * @return string
     *
     * @api
     */
    public function renderLargePaging();

    //--------------------------------------------------------------------------

    /**
     * Get the next page number.
     *
     * @return null|int
     *
     * @api
     */
    public function getCurrentPageFirstItem(): ?int;

    //--------------------------------------------------------------------------

    /**
     * Get the last item for the current page.
     *
     * @return null|int
     *
     * @api
     */
    public function getCurrentPageLastItem(): ?int;

    //--------------------------------------------------------------------------
}
