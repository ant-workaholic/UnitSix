<?php
namespace Training3\OrderInfo\Block;

use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\OrderFactory;


class OrderInfo extends \Magento\Framework\View\Element\Template
{
    const ORDER_ID = 'order_id';
    /**
     * @var OrderFactory
     */
    protected $_orderFactory;

    protected $_coreRegistry;

    /**
     * @param Template\Context $context
     * @param array            $data
     * @param OrderFactory     $orderFactory
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        OrderFactory $orderFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        parent::__construct($context, $data);
        $this->_orderFactory = $orderFactory;
        $this->_coreRegistry = $coreRegistry;
    }

    /**
     * @return array
     */
    public function getOrderInfo()
    {
        $orderId = $this->_coreRegistry->registry(self::ORDER_ID);
        if ($orderId) {
            $order = $this->_orderFactory
                ->create()
                ->load($orderId);
            $result = $this->getOrderDetails($order);
            return $result;
        }
    }
    /**
     * Process order info, convert it to array.
     *
     * @param \Magento\Sales\Model\Order $order
     * @return array
     */
    protected function getOrderDetails($order)
    {
        $resultData = [];
        $resultData['status'] =  $order->getStatus();
        $resultData['total'] = $order->getGrandTotal();
        $resultData['total_invoiced'] = $order->getTotalInvoiced();
        $items = [];
        foreach($order->getItems() as $item) {
            $items[$item->getItemId()]['sku'] = $item->getSku();
            $items[$item->getItemId()]['price'] = $item->getPrice();
        }
        $resultData['items'] = $items;
        return $resultData;
    }

}
