<?php
namespace Training4\Vendor\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class UpgradeData
 *
 * @package Training4\Vendor\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var \Training4\Vendor\Api\Data\VendorInterfaceFactory
     */
    protected $_vendorFactory;

    /**
     * @var \Training4\Vendor\Api\Data\ProductInterfaceFactory
     */
    protected $_productFactory;

    /**
     * @param \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorFactory
     * @param \Training4\Vendor\Api\Data\ProductInterfaceFactory $productFactory
     */
    function __construct(
        \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorFactory,
        \Training4\Vendor\Api\Data\ProductInterfaceFactory $productFactory
    ) {
        $this->_vendorFactory = $vendorFactory;
        $this->_productFactory = $productFactory;
    }

    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /**
         * Create table 'training_comment'
         */
        if ($context->getVersion()
            && version_compare($context->getVersion(), '0.0.9') < 0
        ) {
            $this->_vendorFactory
                ->create()
                ->setName('Adidas')
                ->save();

            $this->_vendorFactory
                ->create()
                ->setName('Nike')
                ->save();

            $this->_productFactory
                ->create()
                ->setProductId(1)
                ->setVendorId(1)
                ->save();

            $this->_productFactory
                ->create()
                ->setProductId(2)
                ->setVendorId(2)
                ->save();

            $this->_productFactory
                ->create()
                ->setProductId(3)
                ->setVendorId(1)
                ->save();

            $this->_productFactory
                ->create()
                ->setProductId(4)
                ->setVendorId(2)
                ->save();
        }
    }
}
