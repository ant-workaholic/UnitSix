<?php
namespace Training4\VendorList\Controller\Info;

use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
/**
 * Class Index
 * @package Training4\VendorList\Controller\Info
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    protected $_coreRegistry;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->_pageFactory = $pageFactory;
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
        $order = $this->getRequest()->getParam('order');
        $dir = $this->getRequest()->getParam('dir');

        if ($order && $dir) {
            $this->_coreRegistry->register('order', $order);
            $this->_coreRegistry->register('dir', $dir);
        }
        $result = $this->_pageFactory->create();
        return $result;
    }
}
