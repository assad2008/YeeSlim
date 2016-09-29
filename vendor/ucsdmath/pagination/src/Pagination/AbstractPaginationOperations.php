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
 * AbstractPaginationOperations provides an abstract base class implementation of {@link AbstractPagination}.
 * This service groups a common code base implementation that Pagination extends.
 *
 * Method list: (+) @api, (-) protected or private visibility.
 *
 * (+) PaginationInterface __construct();
 * (+) void __destruct();
 * (+) int getNextUrl();
 * (+) int getPrevUrl();
 * (+) int getNextPage();
 * (+) int getNumPages();
 * (+) int getPrevPage();
 * (+) int getTotalRecordCount();
 * (+) int getItemsPerPage();
 * (+) int getMaxPagesToShow();
 * (+) int getCurrentPageNumber();
 * (+) int getCurrentPageLastItem();
 * (+) int getCurrentPageFirstItem();
 * (+) PaginationInterface setTotalRecordCount(int $totalRecordCount);
 * (+) PaginationInterface setItemsPerPage(int $itemsPerPage);
 * (+) PaginationInterface setCurrentPageNumber(int $currentPageNumber = null);
 * (-) array getAsArrayListingPages(int $slidingStart, int $slidingEnd);
 *
 * @author Daryl Eisner <deisner@ucsd.edu>
 */
abstract class AbstractPaginationOperations extends AbstractPagination
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
     * Abstract Method Requirements.
     */
    abstract public function renderAsArray();
    abstract public function renderLargePaging();
    abstract public function renderCompactPaging();

    //--------------------------------------------------------------------------

    /**
     * Get the next page number.
     *
     * @return int|null
     *
     * @api
     */
    public function getCurrentPageFirstItem()
    {
        $first = ((int) $this->currentPageNumber - 1) * (int) $this->itemsPerPage + 1;

        return $first > (int) $this->totalRecordCount ? null : $first;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the last item for the current page.
     *
     * @return int
     *
     * @api
     */
    public function getCurrentPageLastItem(): int
    {
        $first = $this->getCurrentPageFirstItem();
        if ($first === null) {
            return null;
        }
        $last = $first + (int) $this->itemsPerPage - 1;

        return ($last > (int) $this->totalRecordCount) ? (int) $this->totalRecordCount : $last;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the maximum pages to display.
     *
     * @return int
     *
     * @api
     */
    public function getMaxPagesToShow(): int
    {
        return (int) $this->getProperty('maxPagesToShow');
    }

    //--------------------------------------------------------------------------

    /**
     * Set the current page number.
     *
     * @param int $currentPageNumber The current page number.
     *
     * @return PaginationInterface The current instance
     *
     * @api
     */
    public function setCurrentPageNumber(int $currentPageNumber = null): PaginationInterface
    {
        if (null !== $currentPageNumber) {
            $this->setProperty('currentPageNumber', $currentPageNumber);
        }

        return $this->normalizePageCounts();
    }

    //--------------------------------------------------------------------------

    /**
     * Get the current page number.
     *
     * @return int
     *
     * @api
     */
    public function getCurrentPageNumber(): int
    {
        return $this->currentPageNumber > $this->pageCount ? static::BASE_PAGE : (int) $this->currentPageNumber;
    }

    //--------------------------------------------------------------------------

    /**
     * Set the number of items (records) per page.
     *
     * @param int $itemsPerPage The number of items per page
     *
     * @return PaginationInterface The current instance
     *
     * @api
     */
    public function setItemsPerPage(int $itemsPerPage): PaginationInterface
    {
        $this->setProperty('itemsPerPage', $itemsPerPage);
        $this->setPageCount();

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the number of items (records) per page.
     *
     * @return int
     *
     * @api
     */
    public function getItemsPerPage(): int
    {
        return (int) $this->getProperty('itemsPerPage');
    }

    //--------------------------------------------------------------------------

    /**
     * Set the total number of records in total.
     *
     * @param int $totalRecordCount The number of total records in database
     *
     * @return PaginationInterface The current instance
     *
     * @api
     */
    public function setTotalRecordCount(int $totalRecordCount): PaginationInterface
    {
        $this->setProperty('totalRecordCount', $totalRecordCount);
        $this->setPageCount();

        return $this;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the number of items in database.
     *
     * @return int
     *
     * @api
     */
    public function getTotalRecordCount(): int
    {
        return (int) $this->getProperty('totalRecordCount');
    }

    //--------------------------------------------------------------------------

    /**
     * Get the number of pages.
     *
     * @return int
     *
     * @api
     */
    public function getNumPages(): int
    {
        return (int) $this->getProperty('pageCount');
    }

    //--------------------------------------------------------------------------

    /**
     * Get the next page number.
     *
     * @return int|null
     *
     * @api
     */
    public function getNextPage()
    {
        return (int) $this->currentPageNumber < $this->pageCount ? (int) $this->currentPageNumber + 1 : null;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the previous page number.
     *
     * @return int|null
     *
     * @api
     */
    public function getPrevPage()
    {
        return (int) $this->currentPageNumber > 1 ? (int) $this->currentPageNumber - 1 : null;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the next page url.
     *
     * @return string|null
     *
     * @api
     */
    public function getNextUrl()
    {
        return $this->getNextPage() ? $this->getPageUrl($this->getNextPage()) : null;
    }

    //--------------------------------------------------------------------------

    /**
     * Get the previous page url.
     *
     * @return string|null
     *
     * @api
     */
    public function getPrevUrl()
    {
        return $this->getPrevPage() ? $this->getPageUrl($this->getPrevPage()) : null;
    }

    //--------------------------------------------------------------------------

    /**
     * Build the list of pages.
     *
     * @param int $slidingStart The sliding start number
     * @param int $slidingEnd   The sliding end number
     *
     * @return array
     */
    protected function getAsArrayListingPages(int $slidingStart, int $slidingEnd): array
    {
        $pages = [];
        $pages[] = $this->createPage(1, (int) $this->currentPageNumber === 1);
        if ($slidingStart > 2) {
            $pages[] = $this->renderPageEllipsis;
        }
        for ($i = $slidingStart; $i <= $slidingEnd; $i++) {
            $pages[] = $this->createPage($i, $i === (int) $this->currentPageNumber);
        }
        if ($slidingEnd < $this->pageCount - 1) {
            $pages[] = $this->renderPageEllipsis;
        }
        $pages[] = $this->createPage($this->pageCount, (int) $this->currentPageNumber === $this->pageCount);

        return $pages;
    }

    //--------------------------------------------------------------------------
}
