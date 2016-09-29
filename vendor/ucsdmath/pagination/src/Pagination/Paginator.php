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

namespace UCSDMath\Pagination;

/**
 * Paginator is the default implementation of {@link PaginationInterface} which
 * provides routine Paginator methods that are commonly used in the framework.
 *
 * Paginator provides a process of dividing (content) into discrete pages that are
 * acceptable or desirable to the enduser.
 *
 * Important considerations in writing this class are:
 *    - SEO Friendly URLS
 *    - Dynamic search results (sticky or hold state)
 *    - Standard scheme for Front Controllers
 *    - Provide options for template generator (e.g., Twig, Plates, Smarty)
 *    - Provided via a data structure (a raw data option)
 *
 * Technically, for pagination to work, all is needed is the page number of the current set.
 *
 *    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
 *    $itemsPerPage = 4;
 *
 *    $totalRecordCount = "SELECT COUNT(*) FROM personnel;
 *    $rowCount   = "SELECT COUNT(*) FROM personnel where group = 'faculty';
 *
 *    if ($totalRecordCount === 0) { print 'No records exist in the database.';}
 *    if ($rowCount === 0)   { print 'No records found in database with you exact match.';}
 *
 *    $pageCount = (int) ceil($rowCount / $itemsPerPage);
 *
 *    // range error; we could just set page = 1
 *    if ($page > $pageCount) {$page = 1;}
 *
 *    $offset = ($page - 1) * $itemsPerPage;
 *    $sql = "SELECT * FROM personnel where (group = 'faculty') (ORDER BY lastname, firstname) LIMIT " . $offset . "," . $itemsPerPage;
 *
 *    SQL looks like:  SELECT * FROM personnel LIMIT 4,4
 *
 * Consider some common url patterns:
 *    - /sso/1/personnel/(:pageNumber)/(:itemsPerPage)/(:sortPattern)/
 *    - /sso/1/personnel/quick-search/(:pageNumber)/(:itemsPerPage)/(:searchPattern)/(:sortPattern)/
 *    - /sso/1/personnel/edit-search/page-(:pageNumber)/show-(:itemsPerPage)/(:searchPattern)/(:sortPattern)/
 *    - /sso/1/personnel/edit-record/page-(:pageNumber)/
 *
 * {@link AbstractPaginationOperations} is basically a handler component of basic
 * paging services for UCSDMath which this class extends.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) PersistenceInterface __construct();
 * (+) void __destruct();
 * (+) array renderAsArray();
 * (+) string renderLargePaging();
 * (+) string renderCompactPaging();
 * (-) array getAsArraySlidingRange();
 * (-) string getLargePagingNextUrl();
 * (-) string getLargePagingPrevUrl();
 * (-) string getCompactPagingNextUrl();
 * (-) string getCompactPagingPrevUrl();
 * (-) string getLargePagingSelections();
 * (-) string getCompactPagingSelectController();
 * (-) string getCompactPagingContainer($containData);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
class Paginator extends AbstractPaginationOperations implements PaginationInterface
{
    /**
     * Constants.
     *
     * @var string VERSION The version number
     *
     * @api
     */
    const VERSION = '1.9.0';

    //--------------------------------------------------------------------------

    /**
     * Properties.
     */

    //--------------------------------------------------------------------------

    /**
     * Constructor.
     *
     * @param array $settings The associated list of page settings.
     *
     * @api
     */
    public function __construct(array $settings)
    {
        parent::__construct($settings);
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

    /**
     * Render a small HTML pagination control.
     *
     * @return string
     *
     * @api
     */
    public function renderCompactPaging(): string
    {
        $html = '';
        if ($this->getNumPages() > 1) {
            $html .= $this->getCompactPagingPrevUrl();
            $html .= $this->getCompactPagingSelectController();
            $html .= $this->getCompactPagingNextUrl();
        } else {
            $html .= sprintf('<span class="fl"><a class="btn btn-default no-pe" href="%s" tabindex="90" title="Select the previous page" type="button">%s</a></span>%s', '#', static::NAVIGATION_ARROW_PREV, "\n");
            $html .= '<select class="form-control paging-select" tabindex="91" title="Jump to a selected page">';
            $html .= sprintf('%s    <option value="%s" %s>Page 1</option>%s</select>', "\n", str_replace(['"'], ['%22'], $this->getPageUrl(1)), 'selected="selected"', "\n", "\n");
            $html .= sprintf('<span class="fl"><a class="btn btn-default no-pe" href="%s" tabindex="92" title="Select the next page" type="button">%s</a></span>%s', '#', static::NAVIGATION_ARROW_NEXT, "\n");
        }
        /* comment: jQuery pagination in /sso/1/assets/js/vendor/ucsdmath-functions.min.js */

        return $this->getCompactPagingContainer($html);
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getCompactPagingSelectController(): string
    {
        $html = sprintf('<select class="form-control paging-select" tabindex="91" title="Jump to a selected page">%s', "\n");
        foreach ($this->renderAsArray() as $render) {
            if ($render['pageUrl']) {
                $html .= '    <option value="' . str_replace(['"'], ['%22'], $render['pageUrl']) . '"';
                $html .= $render['isCurrentPage'] ? ' selected="selected">' : '>';
                $html .= 'Page ' . $render['pageNumber'] . '</option>' . "\n";
            } else {
                $html .= '    <option disabled>' . $render['pageNumber'] . '</option>' . "\n";
            }
        }

        return $html . '</select>' . "\n";
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getCompactPagingNextUrl(): string
    {
        return $this->getNextUrl()
            ? sprintf(
                '<span class="fl"><a class="btn btn-default" href="%s" tabindex="92" title="Select the next page" type="button">%s</a></span>%s',
                str_replace(['"'], ['%22'], $this->getNextUrl()),
                static::NAVIGATION_ARROW_NEXT,
                "\n"
            )
            : sprintf(
                '<span class="fl"><a class="btn btn-default" href="%s" tabindex="92" title="Select the next page" type="button">%s</a></span>%s',
                '#',
                static::NAVIGATION_ARROW_NEXT,
                "\n"
            );
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getCompactPagingPrevUrl(): string
    {
        return $this->getPrevUrl()
            ? sprintf(
                '<span class="fl"><a class="btn btn-default" href="%s" tabindex="90" title="Select the next page" type="button">%s</a></span>%s',
                str_replace(['"'], ['%22'], $this->getPrevUrl()),
                static::NAVIGATION_ARROW_PREV,
                "\n"
            )
            : sprintf(
                '<span class="fl"><a class="btn btn-default" href="%s" tabindex="90" title="Select the previous page" type="button">%s</a></span>%s',
                '#',
                static::NAVIGATION_ARROW_PREV,
                "\n"
            );
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @param string $containData The set of controls to contain (HTML)
     *
     * @return string
     */
    protected function getCompactPagingContainer(string $containData): string
    {
        $html = $this->isItemsPerPageUsed
            ? sprintf('%s<!-- paging controls -->%s<div class="%s">%s', "\n", "\n", 'paging-container', "\n")
            : sprintf('%s<!-- paging controls -->%s<div class="%s">%s', "\n", "\n", 'paging-container-no-show-records', "\n");
        $html .= $containData;
        if ($this->isItemsPerPageUsed) {
            $html .= '<button class="button secondary" id="button-pagination-show" name="button" type="button" tabindex="93" title="Show records per page" value="pagination-show">Show</button>' . "\n";
            $html .= '<input class="input-paginator-items-per-page" id="paginator-items-per-page" name="paginator-items-per-page" type="text" maxlength="5" ';
            $html .= sprintf('tabindex="94" title="Provide the number of records per page" value="%s">', $this->itemsPerPage);
        }

        return $html . "</div>\n<!-- /paging controls -->";
    }

    //--------------------------------------------------------------------------

    /**
     * Render a long HTML pagination control.
     *
     * @return string
     *
     * @api
     */
    public function renderLargePaging(): string
    {
        return ($this->pageCount <= 1)
            ? ''
            : '<ul class="pagination">'.
            $this->getLargePagingPrevUrl().
            $this->getLargePagingSelections().
            $this->getLargePagingNextUrl().
            "</ul>\n";
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getLargePagingSelections(): string
    {
        $html = null;
        foreach ($this->renderAsArray() as $render) {
            $html .= ($render['pageUrl'])
                ? '<li' . ($render['isCurrentPage'] ? ' class="active"' : '') . '><a href="' . $render['pageUrl'] . '">' . $render['pageNumber'] . '</a></li>' . "\n"
                : sprintf('<li class="disabled"><span>%s</span></li>%s', $render['pageNumber'], "\n");
        }

        return $html;
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getLargePagingPrevUrl(): string
    {
        return $this->getPrevUrl() ? sprintf('<li><a href="%s">%s</a></li>%s', $this->getPrevUrl(), static::NAVIGATION_ARROW_PREV, "\n") : null;
    }

    //--------------------------------------------------------------------------

    /**
     * Create a page data structure.
     *
     * @return string
     */
    protected function getLargePagingNextUrl(): string
    {
        return $this->getNextUrl() ? sprintf('<li><a href="%s">%s</a></li>%s', $this->getNextUrl(), static::NAVIGATION_ARROW_NEXT, "\n") : null;
    }

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
    public function renderAsArray(): array
    {
        $pages = [];
        if ($this->pageCount <= 1) {
            return $pages;
        }
        if ($this->pageCount <= $this->maxPagesToShow) {
            for ($i = 1; $i <= $this->pageCount; $i++) {
                $pages[] = $this->createPage($i, $i === (int) $this->currentPageNumber);
            }
        } else {
            list($slidingStart, $slidingEnd) = $this->getAsArraySlidingRange();
            $pages = $this->getAsArrayListingPages($slidingStart, $slidingEnd);
        }

        return $pages;
    }

    //--------------------------------------------------------------------------

    /**
     * Determine the sliding range, centered around the current page.
     *
     * @return array
     */
    protected function getAsArraySlidingRange(): array
    {
        $numberAdjacents = (int) floor(($this->maxPagesToShow - 3) / 2);
        $slidingStart = ((int) $this->currentPageNumber + $numberAdjacents > $this->pageCount) ? $this->pageCount - $this->maxPagesToShow + 2 : (int) $this->currentPageNumber - $numberAdjacents;
        $slidingStart = ($slidingStart < 2) ? 2 : $slidingStart;
        $slidingEnd = $slidingStart + $this->maxPagesToShow - 3;
        $slidingEnd = ($slidingEnd >= $this->pageCount) ? $this->pageCount - 1 : $slidingEnd;

        return [$slidingStart, $slidingEnd];
    }

    //--------------------------------------------------------------------------
}
