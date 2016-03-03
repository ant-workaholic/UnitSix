<?php
namespace Training\Database\Controller\Test;

/**
 * Class Index
 * @package Training\Database\Controller\Test
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Magento\Store\Model\ResourceModel\Store\Collection
     */
    protected $storeCollection;


    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magento\Store\Model\ResourceModel\Store\Collection $collection
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Store\Model\ResourceModel\Store\Collection  $collection)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->storeCollection = $collection;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\View\Result\LayoutFactory
     */
    public function execute()
    {
        $result = $this->storeCollection->toOptionArray();
        var_dump($result);
        exit;
    }
}
