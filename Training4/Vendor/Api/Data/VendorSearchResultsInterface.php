<?php
namespace Training4\Vendor\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface VendorSearchResultInterface
 *
 * @package Trainig4\Vendor\Api\Data
 */
interface VendorSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get vendor list.
     *
     * @return \Training4\Vendor\Api\Data\VendorInterface[]
     */
    public function getItems();

    /**
     * Set vendor list.
     *
     * @param \Training4\Vendor\Api\Data\VendorInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
