<?php
namespace Training\Test\Controller\Product;

use Magento\Catalog\Controller\Product\View as ProductView;

/**
 * Class View
 * @package Training\Test\Controller\Product
 */
class View extends ProductView
{
    public function execute()
    {
        echo "Preference customization";
        exit;
        return ProductView::execute();
    }
}
