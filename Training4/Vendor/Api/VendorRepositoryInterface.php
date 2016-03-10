<?php
namespace Training4\Vendor\Api;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface VendorRepositoryInterface
 * @package Training4\Vendor\Api
 */
interface VendorRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * @param Data\VendorInterface $vendor
     * @return mixed
     */
    public function save(Data\VendorInterface $vendor);

    /**
     * @param $vendor
     * @return mixed
     */
    public function getAssociatedProductIds($vendor);

    /**
     * @param $id
     * @return mixed
     */
    public function load($id);
}
