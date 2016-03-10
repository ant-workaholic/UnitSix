<?php
namespace Training3\ExchangeRate\Block;

/**
 * Class Rate
 *
 * @package Training3\ExchangeRate\Block
 */
class Rate extends \Magento\Framework\View\Element\Template
{
    protected $_exchangeRequest;

    /**
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param array                                             $data
     * @param \Training3\ExchangeRate\Model\ExchangeRateRequest $request
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Training3\ExchangeRate\Model\ExchangeRateRequest $request
    ) {
        $this->_exchangeRequest = $request;
        parent::__construct($context, $data);
    }

    /**
     * @return string
     */
   public function getRateEuro()
   {
       $this->_exchangeRequest->sendRequest();
       $result = $this->_exchangeRequest->getResponseData();
       return $result;
   }
}
