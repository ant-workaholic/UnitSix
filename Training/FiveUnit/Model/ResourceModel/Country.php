<?php
namespace Training\FiveUnit\Model\ResourceModel;

/**
 * Class Country
 * @package Training\FiveUnit\Model\ResourceModel
 */
class Country extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('category_countries', 'category_country_id');
    }
}
