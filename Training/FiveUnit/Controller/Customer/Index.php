<?php
namespace Training\FiveUnit\Controller\Customer;

use Magento\Framework\App\Action\AbstractAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Customer\Model\ResourceModel\CustomerRepository
     */
    protected $_customerRepository;

    /**
     * @var \Magento\Framework\Api\Search\FilterGroupBuilder
     */
    protected $_filterGroupBuilder;

    /**
     * @var \Magento\Framework\Api\FilterBuilder
     */
    protected $_filterBuilder;


    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_searchCriteriaBuilder;

    /**
     * @param Context $context
     * @param \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository
     * @param \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder
     * @param \Magento\Framework\Api\FilterBuilder $filterBuilder
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     */
    public function __construct(
        Context $context,
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Magento\Framework\Api\Search\FilterGroupBuilder $filterGroupBuilder,
        \Magento\Framework\Api\FilterBuilder $filterBuilder,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_filterBuilder = $filterBuilder;
        $this->_filterGroupBuilder = $filterGroupBuilder;
        $this->_customerRepository = $customerRepository;
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
        $filter[] = $this->_filterBuilder
            ->setConditionType('eq')
            ->setField('firstname')
            ->setValue('Veronica')
            ->create();

        $filter[] = $this->_filterBuilder
            ->setConditionType('eq')
            ->setField('lastname')
            ->setValue('test')
            ->create();

        $searchCriteria = $this->_searchCriteriaBuilder
            ->addFilters($filter)
            ->create();

        $customerItems = $this->_customerRepository
            ->getList($searchCriteria)
            ->getItems();
        $cusromerList = $this->_customerRepository
            ->getList($searchCriteria);

        $customerListObjectType = get_class($cusromerList);
        $customers = [];
        foreach ($customerItems as $item) {
            $customers[] = "First name is: " . $item->getFirstname() . " Surname is: " . $item->getLastname();
        }
        var_dump($customers);
        exit;
    }
}