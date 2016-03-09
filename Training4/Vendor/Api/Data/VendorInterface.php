<?php
namespace Training4\Vendor\Api\Data;

/**
 * Interface VendorInterface
 *
 * @package Training4\Vendor\Api\Data
 */
interface VendorInterface
{
    const ID = 'id';
    const NAME = 'name';

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);
}
