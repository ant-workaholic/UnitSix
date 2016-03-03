<?php
namespace Training\Test\Controller\Action;

use Magento\Framework\App\ResponseInterface;

class Text extends \Magento\Framework\App\Action\Action
{
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $layout = $this->_view->getLayout();
        $block = $layout->createBlock('Magento\Framework\View\Element\Text');
        $block->setText("This is the test text for text block");
        $this->getResponse()->appendBody($block->toHtml());
    }
}