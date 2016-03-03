<?php
namespace Training\Test\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RequestObserver implements ObserverInterface
{
    /**
     * @param Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
    }
}
