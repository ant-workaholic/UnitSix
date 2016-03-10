<?php
namespace Training4\Vendor\Model;
use Magento\Framework\Api\SearchCriteriaInterface;
use Training4\Vendor\Api\Data;
use Training4\Vendor\Api\VendorRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class VendorRepository
 * @package Training4\Vendor\Model
 */
class VendorRepository implements VendorRepositoryInterface
{
    /**
     * @var ResourceModel\Vendor\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var \Training4\Vendor\Api\Data\VendorInterfaceFactory
     */
    protected $_vendorInterfaceFactory;

    /**
     * @var \Training4\Vendor\Api\Data\VendorSearchResultsInterface
     */
    protected $_searchCriteriaResultFactory;

    /**
     * @var \Training4\Vendor\Api\Data\VendorInterfaceFactory
     */
    protected $_resource;

    /**
     * @param ResourceModel\Vendor\CollectionFactory $collectionFactory
     * @param Data\VendorSearchResultsInterfaceFactory $searchResultsInterface
     * @param Data\VendorInterfaceFactory $vendorInterfaceFactory
     * @param ResourceModel\Vendor $vendorResource
     */
    function __construct(
        \Training4\Vendor\Model\ResourceModel\Vendor\CollectionFactory $collectionFactory,
        \Training4\Vendor\Api\Data\VendorSearchResultsInterfaceFactory $searchResultsInterface,
        \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorInterfaceFactory,
        \Training4\Vendor\Model\ResourceModel\Vendor $vendorResource


    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_searchCriteriaResultFactory = $searchResultsInterface;
        $this->_vendorInterfaceFactory = $vendorInterfaceFactory;
        $this->_resource = $vendorResource;
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
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Load vendor
     *
     * @param $id
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function load($id)
    {
        $vendor = $this->_vendorInterfaceFactory->create();
        $this->_resource->load($vendor, $id);
        if (!$vendor->getId()) {
            throw new NoSuchEntityException(__('Vendor with id "%1" does not exist.', $id));
        }
        return $vendor;
    }

    /**
     * Get associated product ids
     *
     * @param $vendor
     * @return mixed|void
     */
    public function getAssociatedProductIds($vendor)
    {
        $result = [];
        if ($vendor) {
            if ($vendor instanceof Data\VendorInterface) {
                $vendorId = $vendor->getId();
            } else {
                $vendorId = $vendor;
            }
            /** @var \Training4\Vendor\Model\ResourceModel\Vendor\Collection $collection */
            $result = $this->_resource->getVendorsProductsIds($vendorId);
        }
        return $result;
    }

    /**
     * Save vendors data
     *
     * @param Data\VendorInterface $vendor
     * @return mixed|void
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(Data\VendorInterface $vendor)
    {
        try {
            $this->_resource->save($vendor);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
    }
}
