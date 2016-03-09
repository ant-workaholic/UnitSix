<?php
namespace Training4\Warranty\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;

class UpgradeData implements  UpgradeDataInterface
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

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['install' => $setup]);
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.2') < 0
        ) {
            /** @var \Magento\Eav\Setup\EavSetup $eavSetup */

            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'warranty',
                [
                    'type'                    => 'text',
                    'label'                   => 'Warranty',
                    'input'                   => 'textarea',
                    'system'                  => 0,
                    'global'                  => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
                    'visible'                 => true,
                    'required'                => false,
                    'visible_on_front'        => true,
                    'used_in_product_listing' => true,
                    'backend'                 => 'Training4\Warranty\Model\Attribute\Backend\Warranty',
                    'unique'                  => false,
                    'searchable'              => false,
                    'user_defined'            => false,
                    'frontend'                => 'Training4\Warranty\Model\Attribute\Frontend\Warranty'
                ]
            );
        }
        $setup->endSetup();
    }
}