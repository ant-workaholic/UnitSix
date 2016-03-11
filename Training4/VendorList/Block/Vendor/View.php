<?php
namespace Training4\VendorList\Block\Vendor;

use Magento\Framework\View\Element\AbstractBlock;
use Magento\Framework\View\Element\Template;

/**
 * Class View
 * @package Training4\VendorList\Block\Vendor
 */
class View extends \Magento\Framework\View\Element\Template
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
     * @var \Magento\Catalog\Model\ProductRepositoryFactory
     */
    protected $_productRepositoryFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @param Template\Context $context
     * @param array $data
     * @param \Training4\Vendor\Model\VendorRepositoryFactory $repositoryFactory
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory
     * @param \Magento\Catalog\Model\ProductRepositoryFactory $productRepositoryFactory
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        \Training4\Vendor\Model\VendorRepositoryFactory $repositoryFactory,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        \Magento\Catalog\Model\ProductRepositoryFactory $productRepositoryFactory,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_repositoryFactory = $repositoryFactory;
        $this->_productCollectionFactory = $collectionFactory;
        $this->_filterBuilder = $filterBuilder;
        $this->_productRepositoryFactory = $productRepositoryFactory;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
    public function getVendorName()
    {
        $vendor = $this->_getCurrentVendor();
        if ($vendor && $vendor->getId()) {
            return $vendor->getName();
        }
        return '';
    }

    /**
     * @return bool|mixed
     */
    protected function _getCurrentVendor()
    {
        $id = $this->_coreRegistry->registry('current_vendor_id');
        if ($id) {
            $vendorDataModel = $this->_repositoryFactory->create()
                ->load($id);
            return $vendorDataModel;
        }
        return false;
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getRelatedProductsCollection()
    {
        $id = $this->_coreRegistry->registry('current_vendor_id');
        $repository = $this->_repositoryFactory->create();
        $productsArr = $repository->getAssociatedProductIds($id);
        $productIds = [];
        foreach ($productsArr as $item) {
            $productIds[] = $item['product_id'];
        }
        $productRepository = $this->_productRepositoryFactory->create();
        $filter[] = $this->_filterBuilder
            ->setField('entity_id')
            ->setValue($productIds)
            ->setConditionType('in')
            ->create();
        $searchCriteria = $this->_searchCriteriaBuilder->addFilters($filter)
            ->create();
        $productCollection = $productRepository->getList($searchCriteria)
            ->getItems();
        return $productCollection;
    }
}
