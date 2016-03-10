<?php
namespace Training4\VendorList\Block\ListVendors;

class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar
{
    public function getAvailableViewMode()
    {
        return null;
    }

    /**
     * Retrieve available view modes
     *
     * @return array
     */
    public function getModes()
    {
        return [];
    }

    /**
     * Retrieve widget options in json format
     *
     * @param array $customOptions Optional parameter for passing custom selectors from template
     * @return string
     */
    public function getWidgetOptionsJson(array $customOptions = [])
    {
        $defaultMode = $this->_productListHelper->getDefaultViewMode($this->getModes());
        $options = [
            'mode' => 'vendor_list_order',
            'direction' => 'vendor_list_dir',
            'order' => 'vendor_list_order',
            'limit' => 'vendor_list_limit',
            'modeDefault' => $defaultMode,
            'directionDefault' => $this->_direction ?: 'asc',
            'orderDefault' => 'name',
            'limitDefault' => 9,
            'url' => $this->getPagerUrl(),
        ];
        $options = array_replace_recursive($options, $customOptions);
        return json_encode(['productListToolbarForm' => $options]);
    }

}
