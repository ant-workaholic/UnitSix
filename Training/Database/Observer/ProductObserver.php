<?php
namespace Training\Database\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductObserver implements ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $_logger;

    /**
     * @param \Psr\Log\LoggerInterface $logger
     */
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
        /** @var \Magento\Catalog\Model\Product $product */
        $product = $observer->getProduct();
        $productId = $product->getId();
        $data = '';
        if ($product->isDataChanged()) {
            $origData = $product->getOrigData();
            $data = json_encode($origData);
        }
        $this->_logger->addDebug("Debug -----------" . $productId . "---- CHANGED DATA IS ----" . $data);
    }
}
