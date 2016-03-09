<?php
namespace Training4\Vendor\Model\ResourceModel;

/**
 * Class Product
 *
 * @package Training4\Vendor\Model\ResourceModel
 */
class Product extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training4_vendor2product', 'id');
    }
}
