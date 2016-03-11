<?php
namespace Training4\Warranty\Model\Attribute\Backend;

/**
 * Class Warranty
 * @package Training4\Warranty\Model\Attribute\Backend
 */
class Warranty extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{
    /**
     * @param \Magento\Framework\DataObject $object
     * @return $this
     */
    public function beforeSave($object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if (is_numeric($value)) {
            $value .= " year(s)";
            $object->setData($this->getAttribute()->getAttributeCode(), $value);
        }
        return parent::beforeSave($object);
    }
}
