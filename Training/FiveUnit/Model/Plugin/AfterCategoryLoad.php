<?php
namespace Training\FiveUnit\Model\Plugin;

/**
 * Class AfterCategoryLoad
 * @package Training\FiveUnit\Model\Plugin
 */
class AfterCategoryLoad
{
    /**
     * @var \Magento\Catalog\Api\Data\CategoryExtensionFactory
     */
    protected $countryCategoryExtended;

    /**
     * @var \Training\FiveUnit\Api\Data\CountryInterfaceFactory
     */
    protected $countryFactory;

    /**
     * @param \Magento\Catalog\Api\Data\CategoryExtensionFactory $countryExtensionFactory
     * @param \Training\FiveUnit\Api\Data\CountryInterfaceFactory $countryFactory
     */
    function __construct(
        \Magento\Catalog\Api\Data\CategoryExtensionFactory $countryExtensionFactory,
        \Training\FiveUnit\Api\Data\CountryInterfaceFactory $countryFactory
    ) {
        $this->countryFactory = $countryFactory;
        $this->countryCategoryExtended = $countryExtensionFactory;
    }

    /**
     * @param \Magento\Catalog\Model\Category $category
     * @return \Magento\Catalog\Model\Category
     */
    public function afterLoad(\Magento\Catalog\Model\Category $category)
    {
        $categoryId = $category->getId();
        $country = $this->countryFactory->create()->load($categoryId, 'category_id');
        $extensionAttributes = $category->getExtensionAttributes();
        if ($extensionAttributes == null) {
            $extensionAttributes = $this->countryCategoryExtended->create();
        }
        $extensionAttributes->setCountry($country);
        $category->setExtensionAttributes($extensionAttributes);
        return $category;
    }
}
