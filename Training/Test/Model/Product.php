<?php
namespace Training\Test\Model;

/**
 * Class Product
 * @package Training\Test\Model
 */
class Product
{
    public function afterGetPrice()
    {
        return 5;
    }
}
