<?php
namespace Training4\Vendor\Api\Data;

interface ProductInterface
{
    const PRODUCT_ID = 'product_id';
    const VENDOR_ID = 'vendor_id';

    /**
     * @return mixed
     */
    public function getProductId();

    /**
     * @return mixed
     */
    public function getVendorId();

    /**
     * @param $productId
     * @return mixed
     */
    public function setProductId($productId);

    /**
     * @param $vendorId
     * @return mixed
     */
    public function setVendorId($vendorId);
}
