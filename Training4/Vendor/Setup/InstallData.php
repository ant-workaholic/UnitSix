<?php

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 */
class InstallData implements  InstallDataInterface
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
     * @var Magento\Catalog\Model\ProductRepository
     */
    protected $_productRepository;

    /**
     * @param \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorFactory
     * @param \Training4\Vendor\Api\Data\ProductInterfaceFactory $productFactory
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     */
    function __construct(
        \Training4\Vendor\Api\Data\VendorInterfaceFactory $vendorFactory,
        \Training4\Vendor\Api\Data\ProductInterfaceFactory $productFactory,
        \Magento\Catalog\Model\ProductRepository $productRepository
    ) {
        $this->_vendorFactory = $vendorFactory;
        $this->_productFactory = $productFactory;
        $this->_productRepository = $productRepository;
    }
    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->_vendorFactory
            ->create()
            ->setName('Adidas')
            ->save();

        $this->_vendorFactory
            ->create()
            ->setName('Nike')
            ->save();

        $this->_vendorFactory
            ->create()
            ->setName('ZARA')
            ->save();

        $this->_vendorFactory
            ->create()
            ->setName('BOSS')
            ->save();

        $this->_vendorFactory
            ->create()
            ->setName('PUMA')
            ->save();

        /// Add link vendor to product
        $repository = $this->_productRepository->create();

        $product = $repository->getById(1);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(1)
                ->setVendorId(1)
                ->save();
        }

        $product = $repository->getById(2);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(2)
                ->setVendorId(1)
                ->save();
        }

        $product = $repository->getById(3);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(3)
                ->setVendorId(2)
                ->save();
        }

        $product = $repository->getById(4);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(4)
                ->setVendorId(2)
                ->save();
        }

        $product = $repository->getById(5);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(5)
                ->setVendorId(3)
                ->save();
        }
        $product = $repository->getById(6);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(6)
                ->setVendorId(4)
                ->save();
        }
        $product = $repository->getById(7);
        if ($product && $product->getId()) {
            $this->_productFactory
                ->create()
                ->setProductId(7)
                ->setVendorId(5)
                ->save();
        }
    }

}