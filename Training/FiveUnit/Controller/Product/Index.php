<?php
namespace Training\FiveUnit\Controller\Product;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Catalog\Model\ProductRepository
     */
    protected $_productRespository;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * @var \Magento\Framework\Api\FilterBuilder $filterBuilder
     */
    protected $_filterBuilder;

    /**
     * @var \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    protected $_sortOrderBuilder;

    /**
     * @param Context $context
     * @param \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
     * @param PageFactory $resultPageFactory
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
     */
    public function __construct(
        Context $context,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        PageFactory $resultPageFactory,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SortOrderBuilder $sortOrderBuilder
    ) {
        $this->_productRespository = $productRepository;
        $this->_pageFactory = $resultPageFactory;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_filterBuilder = $filterBuilder;
        $this->_sortOrderBuilder = $sortOrderBuilder;
        parent::__construct($context);
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $sortOrder = $this->_sortOrderBuilder
            ->setField('name')
            ->setDirection('DESC')
            ->create();

        $filters[] = $this->_filterBuilder
            ->setField('price')
            ->setConditionType('lt')
            ->setValue(70)
            ->create();

        $filters[] = $this->_filterBuilder
            ->setField('price')
            ->setConditionType('gt')
            ->setValue(40)
            ->create();
        // $filters array represents logical AND function

        $searchCriteria = $this->_searchCriteriaBuilder
            ->setPageSize(6)
            ->addSortOrder($sortOrder)
            ->addFilters($filters)
            ->create();

        $productList = $this->_productRespository
            ->getList($searchCriteria);
        $productList->setTotalCount(6);
        $items = $productList->getItems();
        $names = [];
        foreach ($items as $item) {
            $names[] = "Price is " . $item->getPrice() . " name is " . $item->getName();
        }
        var_dump($names);
        exit;
    }

}