<?php
/**
 *
 */
namespace Training\Test\Controller\Action;

use Magento\Framework\App\ResponseInterface;

class Config extends \Magento\Framework\App\Action\Action
{
    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $testConfig = $this->_objectManager
            ->get('Training\Test\Model\Config\ConfigInterface');
        $myNodeInfo = $testConfig->getMyNodeInfo();
        if (is_array($myNodeInfo)) {
            foreach($myNodeInfo as $str) {
                $this->getResponse()->appendBody($str . "<BR>");
            }
        }
    }
}
