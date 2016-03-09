<?php
namespace Training4\Vendor\Model;
use Magento\Framework\Api\SearchCriteriaInterface;
use Training4\Vendor\Api\VendorRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Reflection\DataObjectProcessor;


class VendorRepository implements VendorRepositoryInterface
{
    protected $_collectionFactory;

    /**
     * @var \Training4\Vendor\Api\Data\VendorInterfaceFactory
     */
    protected $_vendorInterfaceFactory;

    /**
     * @var \Training4\Vendor\Api\Data\VendorSearchResultsInterface
     */
    protected $_searchCriteriaResultFactory;

    function __construct(
        \Training4\Vendor\Model\ResourceModel\Vendor\CollectionFactory $collectionFactory,
        \Training4\Vendor\Api\Data\VendorSearchResultsInterfaceFactory $searchResultsInterface,
        \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorInterfaceFactory
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_searchCriteriaResultFactory = $searchResultsInterface;
        $this->_vendorInterfaceFactory = $vendorInterfaceFactory;
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $searchResults = $this->_searchCriteriaResultFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);

        $collection = $this->_collectionFactory->create();
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(), [$condition => $filter->getValue()]);
            }
        }
        $searchResults->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();
        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->load();
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setSearchCriteria($searchCriteria);
        return $searchResults;
    }
}
