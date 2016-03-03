<?php
namespace Training\FiveUnit\Api\Data;

interface CountryInterface
{
    const CATEGORY_COUNTRY_ID = 'category_country_id';
    const CATEGORY_ID = 'category_id';
    const COUNTRY_ID = 'country_id';

    /**
     * @return int
     */
    public function getCategoryCountryId();

    /**
     * @return int
     */
    public function getCategoryId();

    /**
     * @return int
     */
    public function getCountryId();

    /**
     * @param $id
     * @return CountryInterface
     */
    public function setCategoryCountryId($id);

    /**
     * @param $categoryId
     * @return CountryInterface
     */
    public function setCategoryId($categoryId);

    /**
     * @param $countryId
     * @return CountryInterface
     */
    public function setCountryId($countryId);
}
