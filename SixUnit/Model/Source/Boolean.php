<?php
namespace Training\SixUnit\Model\Source;

class Boolean implements \Magento\Framework\Option\ArrayInterface
{
    const VALUE_YES = 1;
    const VALUE_NO = 0;

    /**
     * @var null
     */
    protected $_options = null;
    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['label' => __('Yes'), 'value' => self::VALUE_YES],
                ['label' => __('No'), 'value' => self::VALUE_NO],
            ];
        }
        return $this->_options;
    }


    /**
     * Get a text for option value
     *
     * @param  string|int $value
     * @return string|bool
     */
    public function getOptionText($value)
    {
        $options = $this->getAllOptions();
        // Fixed for tax_class_id and custom_design
        if (sizeof($options) > 0) {
            foreach ($options as $option) {
                if (isset($option['value']) && $option['value'] == $value) {
                    return isset($option['label']) ? $option['label'] : $option['value'];
                }
            }
        }
        // End
        if (isset($options[$value])) {
            return $options[$value];
        }
        return false;
    }

    /**
     * @param string $value
     * @return null|string
     */
    public function getOptionId($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if (strcasecmp($option['label'], $value) == 0 || $option['value'] == $value) {
                return $option['value'];
            }
        }
        return null;
    }

    /**
     * Add Value Sort To Collection Select
     *
     * @param \Magento\Eav\Model\Entity\Collection\AbstractCollection $collection
     * @param string $dir direction
     * @return $this
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @codeCoverageIgnore
     */
    public function addValueSortToCollection($collection, $dir = \Magento\Framework\Data\Collection::SORT_ORDER_DESC)
    {
        return $this;
    }

    /**
     * Retrieve flat column definition
     *
     * @codeCoverageIgnore
     * @return array
     */
    public function getFlatColumns()
    {
        return [];
    }

    /**
     * Retrieve Indexes(s) for Flat
     *
     * @return array
     * @codeCoverageIgnore
     */
    public function getFlatIndexes()
    {
        return [];
    }

    /**
     * Retrieve Select For Flat Attribute update
     *
     * @param int $store
     * @return \Magento\Framework\DB\Select|null
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @codeCoverageIgnore
     */
    public function getFlatUpdateSelect($store)
    {
        return null;
    }

    /**
     * Get a text for index option value
     *
     * @param string|int $value
     * @return string|bool
     * @codeCoverageIgnore
     */
    public function getIndexOptionText($value)
    {
        return $this->getOptionText($value);
    }

}