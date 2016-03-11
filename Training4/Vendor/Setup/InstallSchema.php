<?php
namespace Training4\Vendor\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


/**
 * Class InstallSchema
 * @package Training4\Vendor\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('training4_vendor')
        )->addColumn(
            'vendor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'Vendor id'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Name'
        )->setComment(
            'Vendor table'
        );
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable(
            $installer->getTable('training4_vendor2product')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'ID'
        )->addColumn(
            'vendor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Vendor ID'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['unsigned' => true, 'nullable' => false],
            'Product ID'
        )->addIndex(
            $installer->getIdxName('training4_vendor2product', ['vendor_id']),
            ['vendor_id']
        )->addIndex(
            $installer->getIdxName('training4_vendor2product', ['product_id']),
                ['product_id']
        )->addForeignKey(
            $installer->getFkName('training4_vendor2product', 'product_id', 'catalog_product_entity', 'entity_id'),
            'vendor_id',
            $installer->getTable('catalog_product_entity'),
            'entity_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->addForeignKey(
            $installer->getFkName('training4_vendor2product', 'vendor_id', 'training4_vendor', 'vendor_id'),
            'vendor_id',
            $installer->getTable('training4_vendor'),
            'vendor_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )
        ->setComment(
            'Vendor to product table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
