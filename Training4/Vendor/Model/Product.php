<?php
namespace Training4\Vendor\Model;
use Training4\Vendor\Api\Data;

/**
 * Class Product
 *
 * @package Training4\Vendor\Model
 */
class Product extends \Magento\Framework\Model\AbstractModel implements Data\ProductInterface
{
    protected function _construct()
    {
        $this->_init('Training4\Vendor\Model\ResourceModel\Product');
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * @return mixed
     */
    public function getVendorId()
    {
        return $this->getData(self::VENDOR_ID);
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @param $vendorId
     * @return mixed
     */
    public function setVendorId($vendorId)
    {
        return $this->setData(self::VENDOR_ID, $vendorId);
    }
}
