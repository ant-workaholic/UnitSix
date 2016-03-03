<?php
namespace Training\SixUnit\Ui\Element\UiComponent\DataProvider;

use Magento\Framework\Data\Collection;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\DataProvider\AddFilterToCollectionInterface;

class RegularFilter implements AddFilterToCollectionInterface
{
    /**
     * @var \Magento\Framework\App\ResourceConnection
     */
    protected $resourceConnection;

    /**
     * @param \Magento\Framework\App\ResourceConnection $resourceConnection
     */
    function __construct(\Magento\Framework\App\ResourceConnection $resourceConnection)
    {
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @param Collection $collection
     * @param string $field
     * @param string|null $condition
     * @return void
     */
    public function addFilter(Collection $collection, $field, $condition = null)
    {
        $collection->addFieldToFilter('type_id', ['eq' => 'configurable']);
        $connection = $this->resourceConnection->getConnection();
        $select = $connection
            ->select()
            ->from('catalog_product_super_attribute', array())
            ->columns(array('count' => new \Zend_Db_Expr('COUNT(*)')))
            ->group('catalog_product_super_attribute.product_id');

        $collection->getSelect()->joinLeft(array('cnt' => new \Zend_Db_Expr('(' . $select . ')')),
            'main_table.entity_id = cnt.product_id',
            array()
        )->where('count = ?', $field->getValue());
    }
}
