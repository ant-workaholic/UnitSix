<?php
namespace Training\FiveUnit\Model;
use Magento\Framework\Model\AbstractModel;
use Training\FiveUnit\Api\Data\CommentInterface;
use Training\FiveUnit\Api\Data\CountryInterface;

/**
 * Class Comment
 * @package Training\FiveUnit\Model
 */
class Country extends \Magento\Framework\Model\AbstractModel implements \Training\FiveUnit\Api\Data\CountryInterface
{
    protected function _construct()
    {
        $this->_init('Training\FiveUnit\Model\ResourceModel\Country');
    }

    /**
     * @return int
     */
    public function getCategoryCountryId()
    {
        return $this->getData(self::CATEGORY_COUNTRY_ID);
    }

    /**
     * @param $id
     * @return CountryInterface
     */
    public function setCategoryCountryId($id)
    {
        return $this->setData(self::CATEGORY_COUNTRY_ID, $id);
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    /**
     * @return int
     */
    public function getCountryId()
    {
        return $this->getData(self::COUNTRY_ID);
    }

    /**
     * @param $categoryId
     * @return CountryInterface
     */
    public function setCategoryId($categoryId)
    {
        return $this->setData(self::CATEGORY_ID, $categoryId);
    }

    /**
     * @param $countryId
     * @return CountryInterface
     */
    public function setCountryId($countryId)
    {
        return $this->setData(self::COUNTRY_ID, $countryId);
    }

}
