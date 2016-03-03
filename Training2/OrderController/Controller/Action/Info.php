<?php
namespace Training2\OrderCintroller\Controller\Action;

use Magento\Framework\App\Action\AbstractAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Sales\Model\OrderFactory;

class Info extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Sales\Model\OrderFactory
     */
    protected $orderFactory;

    /**
     * Order info
     *
     * @param Context $context
     * @param OrderFactory $factory
     */
    public function __construct(Context $context, OrderFactory $factory)
    {
        $this->orderFactory = $factory;
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
        $orderId = $this->getRequest()->getParam('order_id');
        if ($orderId) {
            /** @var \Magento\Sales\Model\Order $order */
            $order = $this->orderFactory
                ->create()
                ->load($orderId);
            $result = $this->getOrderInfo($order);
            var_dump($result);
            exit;
        }
        echo "test";
        exit;
    }

    /**
     * @param $order
     * @return array
     */
    protected function getOrderInfo($order)
    {
        $resultData = [];
        $resultData['status'] =  $order->getStatus();
        $resultData['total'] = $order->getGrandTotal();
        $resultData['total_invoiced'] = $order->getTotalInvoiced();
        $items = [];
        foreach($order->getItems() as $item) {
            $items[]['sku'] = $item->getSku();
            $items[]['item_id'] = $item->getItemId();
            $items[]['price'] = $item->getPrice();
        }
        $resultData['items'] = $items;
        return $resultData;
    }
}
