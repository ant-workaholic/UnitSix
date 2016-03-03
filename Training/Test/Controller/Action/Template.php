<?php
namespace Training\Test\Controller\Action;

use Magento\Framework\App\ResponseInterface;


use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Template extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
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
        $block = $this->_view
            ->getLayout()
            ->createBlock('Training\Test\Block\Test');
        $block->setTemplate('custom\test.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }

}