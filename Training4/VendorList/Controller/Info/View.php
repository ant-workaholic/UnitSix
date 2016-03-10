<?php
namespace Training4\VendorList\Controller\Info;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;

/**
 * Class View
 * @package Training4\VendorList\Controller\Info
 */
class View extends \Magento\Framework\App\Action\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var
     */
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
        $this->_pageFactory = $pageFactory;
        $this->_coreRegistry = $coreRegistry;

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
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $this->_coreRegistry->register('current_vendor_id', $id);
        }
        $result = $this->_pageFactory->create();
        return $result;
    }
}
