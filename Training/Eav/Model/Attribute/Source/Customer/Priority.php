<?php
namespace Training\Eav\Model\Attribute\Source\Customer;

class Priority extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('1'), 'value' => 1],
                ['label' => __('2'), 'value' => 2],
                ['label' => __('3'), 'value' => 3],
                ['label' => __('4'), 'value' => 4],
                ['label' => __('5'), 'value' => 5],
                ['label' => __('6'), 'value' => 6],
                ['label' => __('7'), 'value' => 7],
                ['label' => __('8'), 'value' => 8],
                ['label' => __('9'), 'value' => 9],
                ['label' => __('10'), 'value' => 10]
            ];
        }
        return $this->_options;
    }

}