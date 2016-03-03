<?php
namespace Training\FiveUnit\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        /**
         * Create table 'training_comment'
         */
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.2') < 0
        ) {
        $table = $installer->getConnection()->newTable(
            $installer->getTable('training_comment')
        )->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                ' Title'
            )->addColumn(
                'content',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                '2M',
                [],
                'Content'
            )->setComment(
                'Comment Table'
            );
        $installer->getConnection()->createTable($table);
        }
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.5') < 0
        ) {

            $table = $installer->getConnection()->newTable(
                $installer->getTable('category_countries')
            )->addColumn(
                    'category_country_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    null,
                    ['identity' => true, 'nullable' => false, 'primary' => true],
                    'ID'
                )->addColumn(
                    'category_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    255,
                    ['nullable' => false],
                    'Category id'
                )->addColumn(
                    'country_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                    '2M',
                    [],
                    'Country id'
                )->setComment(
                    'Country category Table'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
