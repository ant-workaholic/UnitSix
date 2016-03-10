<?php
namespace Training4\Vendor\Model\ResourceModel\Vendor;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\DB\Select;

/**
 * Class Collection
 *
 * @package Training4\Vendor\Model\ResourceModel\Vendor
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
        $this->_init('Training4\Vendor\Model\Vendor', 'Training4\Vendor\Model\ResourceModel\Vendor');
        $this->_map['fields']['vendor_id'] = 'main_table.vendor_id';
    }

    /**
     * @param $tableName
     * @param $linkField
     * @param $vendorId
     */
    protected function addProductRelationTable($tableName, $linkField, $vendorId)
    {
        $this->getSelect()->join(
            ['product_table' => $this->getTable($tableName)],
             'main_table.' . $linkField . ' = product_table.' . $linkField .
             ' AND product_table.' . $linkField . ' = ' . $vendorId,
            []
         );
    }

    /**
     * @param $tableName
     * @param $linkField
     */
    protected function joinProductRelationTable($tableName, $linkField)
    {
        $this->getSelect()->join(
            ['product_table' => $this->getTable($tableName)],
            'main_table.' . $linkField . ' = product_table.' . $linkField,
            []
        );
    }


    /**
     * @param $vendorId
     * @return $this
     */
    public function addVendorFilter($vendorId)
    {
        $this->addProductRelationTable('training4_vendor2product', 'vendor_id', $vendorId);
        return $this;
    }

    /**
     * @param array|string $field
     * @param null $condition
     * @return $this
     */
    public function addFieldToFilter($field, $condition = null)
    {
        if ($field == 'product_id') {
            $this->joinProductRelationTable('training4_vendor2product', 'vendor_id');
        }
        return parent::addFieldToFilter($field, $condition);
    }
}
