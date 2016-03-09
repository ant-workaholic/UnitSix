<?php
namespace Training4\Vendor\Api;
use Magento\Framework\Api\SearchCriteriaInterface;

interface VendorRepositoryInterface
{
    public function getList(SearchCriteriaInterface $searchCriteria);
}
