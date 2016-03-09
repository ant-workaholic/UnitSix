<?php
namespace Training3\ExchangeRate\Model;

/**
 * Class RateExchange
 * @package Training3\ExchangeRate\Model
 */
class RateExchange extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Training3\ExchangeRate\Model\ResourceModel\ExchangeRate');
    }
}
