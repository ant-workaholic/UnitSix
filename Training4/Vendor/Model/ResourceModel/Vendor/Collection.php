<?php
namespace Training4\Vendor\Model\ResourceModel\Vendor;

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
    }

    /**
     * Join product relation table if there is product filter
     *
     * @param string $tableName
     * @param string|null $linkField
     * @return void
     */
    /**protected function joinStoreRelationTable($tableName, $linkField)
    {
        if ($this->getFilter('product')) {
            $this->getSelect()->join(
                ['store_table' => $this->getTable($tableName)],
                'main_table.' . $linkField . ' = product_table.' . $linkField,
                []
            )->group(
                'main_table.' . $linkField
            );
        }
        parent::_renderFiltersBefore();
    }**/
    /**
     * Join store relation table if there is store filter
     *
     * @return void
     */
    /**protected function _renderFiltersBefore()
    {
        $this->joinStoreRelationTable('training4_vendor2product', 'vendor_id');
    }**/

}
