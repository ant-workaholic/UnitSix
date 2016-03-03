<?php
namespace Training\SixUnit\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements UpgradeDataInterface
{

    /**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['install' => $setup]);
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.7') < 0
        ) {
            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'sew_out_text',
                [
                    'type' => 'varchar',
                    'label' => 'Test Sew out text',
                    'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => true,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => 'simple',
                    'searchable' => false,
                    'user_defined' => false
                ]
            );
        }
        $setup->endSetup();
    }
}
