<?php
namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class LogPageOut implements ObserverInterface
{
    protected $_logger = null;

    function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        return;
        $response = $observer->getEvent()->getData('response');
        $body = $response->getBody();
        $this->_logger->addDebug("----------\n\n\n BODY \n\n\n" . $body);
    }
}
