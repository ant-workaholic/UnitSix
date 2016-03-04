<?php
namespace Training2\OrderController\Controller\Action;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Sales\Model\OrderFactory;

/**
 * Retrieve information about requested order
 * Otherwise, retrieve information message.
 *
 * @package Training2\OrderController\Controller\Action
 */
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
        $layout = $this->_view->getLayout();

        /** @var \Magento\Framework\View\Element\Text $block */
        $block = $layout->createBlock('Magento\Framework\View\Element\Text');
        if ($orderId) {
            /** @var \Magento\Sales\Model\Order $order */
            $order = $this->orderFactory
                ->create()
                ->load($orderId);
            if ($order->getId()) {
                $result = $this->_toJson($this->getOrderInfo($order));
                $block->setText($result);
                $this->getResponse()->appendBody($block->toHtml());
                return;
            }
        }
        $block->setText(__('Your order wasn\'t found, please specify another order id.'));
        $this->getResponse()->appendBody($block->toHtml());
    }

    /**
     * Process order info, convert it to array.
     *
     * @param \Magento\Sales\Model\Order $order
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
            $items[$item->getItemId()]['sku'] = $item->getSku();
            $items[$item->getItemId()]['price'] = $item->getPrice();
        }
        $resultData['items'] = $items;
        return $resultData;
    }

    /**
     * Convert data to json format
     *
     * @param $param
     * @return string
     */
    protected function _toJson($param)
    {
        return json_encode($param);
    }
}
