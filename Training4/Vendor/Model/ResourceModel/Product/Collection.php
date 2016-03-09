<?php
namespace Training4\Vendor\Model\ResourceModel\Product;

/**
 * Class Collection
 *
 * @package Training4\Vendor\Model\ResourceModel\Product
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Training4\Vendor\Model\Product', 'Training4\Vendor\Model\ResourceModel\Product');
    }
}
