<?php
namespace Training3\OrderInfo\Plugin;

use Magento\Framework\View\Result\PageFactory;

/**
 * Class Info
 * @package Training3\OrderInfo\Plugin
 */
class Info
{
    const ORDER_ID = 'order_id';

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Framework\Registry $coreRegistry
     * @param PageFactory $pageFactory
     */
    function __construct(
        \Magento\Framework\Registry $coreRegistry,
        PageFactory $pageFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_pageFactory = $pageFactory;
    }

    /**
     * @param $subject
     * @param $result
     * @return \Magento\Framework\View\Result\Page
     */
    public function afterExecute($subject, $result)
    {
        $param = $subject->getRequest()->getParam('json');
        $orderId = $subject->getRequest()->getParam('order_id');
        if (!$param && $orderId) {
            $this->_coreRegistry->register(self::ORDER_ID, $orderId);
            $result = $this->_pageFactory->create();
        }
        return $result;
    }
}
