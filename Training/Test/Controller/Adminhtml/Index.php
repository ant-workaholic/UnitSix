<?php
namespace Training\Test\Controller\Adminhtml;

use Magento\Framework\App\ResponseInterface;

class Index extends \Magento\Backend\App\Action
{
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $this->getResponse()->appendBody("Hello world in admin");
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        $secret = $this->getRequest()->getParam('secret');
        return isset($secret) && (int) $secret;
    }
}
