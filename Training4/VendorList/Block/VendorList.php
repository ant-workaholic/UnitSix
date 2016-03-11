<?php
namespace Training4\VendorList\Block;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Template;
use Training4\VendorList\Model\Session;

class VendorList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Training4\Vendor\Model\VendorRepositoryFactory
     */
    protected $_repositoryFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $_filterBuilder;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Training4\Vendor\Model\ResourceModel\Vendor\CollectionFactory
     */
    protected $_vendorCollectionFactory;

    protected $_sortOrderBuilder;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Registry $coreRegistry,
        \Training4\Vendor\Model\ResourceModel\Vendor\CollectionFactory $collectionFactory,
        \Training4\Vendor\Model\VendorRepositoryFactory $repositoryFactory,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    ) {

        parent::__construct($context, $data);

        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_filterBuilder = $filterBuilder;
        $this->_coreRegistry = $coreRegistry;
        $this->_vendorCollectionFactory = $collectionFactory;
        $this->_repositoryFactory = $repositoryFactory;
        $this->_sortOrderBuilder = $sortOrderBuilder;
    }

    /**
     * @return mixed
     */
    public function getProductVendors()
    {
        $order = $this->_coreRegistry->registry('order');
        $dir = $this->_coreRegistry->registry('dir');

        /** @var \Training4\Vendor\Model\VendorRepository $repository */
        $repository = $this->_repositoryFactory
            ->create();
        if ($order && $dir) {
            $sortOrder = $this->_sortOrderBuilder
                ->setField($order)
                ->setDirection(strtoupper($dir))
                ->create();
            //Set filter to search criteria
            $searchCriteria = $this->_searchCriteriaBuilder->addSortOrder($sortOrder)
                ->create();
        } else {
        //Set filter to search criteria
        $searchCriteria = $this->_searchCriteriaBuilder
            ->create();
        }
        //Pass order criteria with filters to the repository
        $vendors = $repository->getList($searchCriteria)->getItems();
        return $vendors;
    }


}
