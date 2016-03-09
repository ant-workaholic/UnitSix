<?php
namespace Training4\Vendor\Block\Product;


use Magento\Framework\View\Element\Template;

/**
 * Class Vendor
 *
 * @package Training4\Vendor\Block\Product
 */
class Vendor extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Training4\Vendor\Model\VendorRepositoryFactory
     */
    protected $_repositoryFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        array $data = [],
        \Training4\Vendor\Model\VendorRepositoryFactory $repository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        parent::__construct($context, $data);
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_repositoryFactory = $repository;
    }

    public function getProductVendors()
    {
        /** @var \Training4\Vendor\Model\VendorRepository $repository */
        $repository = $this->_repositoryFactory
            ->create();
        $searchCriteria = $this->_searchCriteriaBuilder
            ->create();
        $vendors = $repository->getList($searchCriteria)->getItems();
        return $vendors;
    }
}
