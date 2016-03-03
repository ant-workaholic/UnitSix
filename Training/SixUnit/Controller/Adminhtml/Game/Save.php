<?php
namespace Training\SixUnit\Controller\Adminhtml\Game;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action;
class Save extends \Magento\Backend\App\Action
{
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }

}