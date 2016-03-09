<?php
namespace Training3\ExchangeRate\Model\ResourceModel;

/**
 * Class RateExchange
 * @package Training3\ExchangeRate\Model\ResourceModel
 */
class RateExchange extends  \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('rate_exchange', 'id');
    }
}
