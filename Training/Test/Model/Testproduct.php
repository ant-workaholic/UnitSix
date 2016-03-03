<?php
namespace Training\Test\Model;

/**
 * Class Testproduct
 * @package Training\Test\Model
 */
class Testproduct extends \Magento\Catalog\Model\Product
{
    public function getPrice()
    {
        return 3;
    }
}