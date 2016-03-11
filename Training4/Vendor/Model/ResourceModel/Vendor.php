<?php
namespace Training4\Vendor\Model\ResourceModel;

/**
 * Class Vendor
 *
 * @package Training4\Vendor\Model\ResourceModel
 */
class Vendor extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training4_vendor', 'vendor_id');
    }

    /**
     * @param $vendorId
     * @return array
     */
    public function getVendorsProductsIds($vendorId)
    {
        if ($vendorId) {
            $connection = $this->getConnection();
            $select = $connection->select()
                ->from(array(
                    'link_table'=> $this->getTable('training4_vendor2product')),
                    ['link_table.product_id']
                )->join(array('vendors' => $this->getMainTable()),
                    'vendors.vendor_id = link_table.vendor_id'
                )->where('vendors.vendor_id = ?', $vendorId);
        $result = $connection->fetchAll($select);
        return $result;
        }
    }
}
