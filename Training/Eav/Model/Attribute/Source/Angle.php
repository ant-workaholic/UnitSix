<?php
namespace Training\Eav\Model\Attribute\Source;

class Angle extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    const VALUE_LEFT = 1;
    const VALUE_RIGHT = 2;
    const VALUE_TOP = 3;
    const VALUE_BOTTOM = 4;

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('35'), 'value' => self::VALUE_LEFT],
                ['label' => __('45'), 'value' => self::VALUE_RIGHT],
                ['label' => __('90'), 'value' => self::VALUE_TOP],
                ['label' => __('120'), 'value' => self::VALUE_BOTTOM]
            ];
        }
        return $this->_options;
    }
}
