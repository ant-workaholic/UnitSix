<?php
namespace Training4\Warranty\Model\Attribute\Frontend;

/**
 * Class Warranty
 * @package Training4\Warranty\Model\Attribute\Frontend
 */
class Warranty extends \Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend
{
    /**
     * @param \Magento\Framework\DataObject $object
     * @return mixed
     */
    public function getValue(\Magento\Framework\DataObject $object)
    {
        $value = $object->getData($this->getAttribute()->getAttributeCode());
        $value = stripslashes('<b>' . $value . '</b>');
        $object->setData($this->getAttribute()->getAttributeCode(), $value);
        return parent::getValue($object);
    }
}
