<?php
namespace Training4\VendorList\Block\ListVendors;
use Magento\Framework\View\Element\Template;


/**
 * Class Filter
 * @package Training4\VendorList\Block\ListVendors
 */
class Filter extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @param Template\Context $context
     * @param array $data
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Get sort order asc url
     *
     * @return string
     */
    public function getFilterNameUrlASC()
    {
        return $this->getUrl('*/*/', array('order' => 'name', 'dir' => 'asc'));
    }

    /**
     * Get sort order desc url
     *
     * @return string
     */
    public function getFilterNameUrlDESC()
    {
        return $this->getUrl('*/*/', array('order' => 'name', 'dir' => 'desc'));
    }

    /**
     * @return mixed
     */
    public function getCurrentDir()
    {
        $dir = $this->_coreRegistry
            ->registry('dir');
        if (!$dir) {
            return 'asc';
        }
        return $dir;
    }
}
