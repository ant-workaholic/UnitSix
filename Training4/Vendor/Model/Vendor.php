<?php
namespace Training4\Vendor\Model;

use Training4\Vendor\Api\Data;
/**
 * Class Vendor
 *
 * @package Training4\Vendor\Model
 */
class Vendor extends \Magento\Framework\Model\AbstractModel implements Data\VendorInterface
{
    protected function _construct()
    {
        $this->_init('Training4\Vendor\Model\ResourceModel\Vendor');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
}
