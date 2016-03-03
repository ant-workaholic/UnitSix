<?php
namespace Training\Test\Model\Config;

/**
 * Class SchemaLocator
 * @package Training\Test\Model\Config
 */
class SchemaLocator implements \Magento\Framework\Config\SchemaLocatorInterface
{

    /**
     * @var null|string
     */
    protected $_schema = null;

    /**
     * @var null
     */
    protected $_perFileSchema = null;

    function __construct(\Magento\Framework\Module\Dir\Reader $moduleReader)
    {
        $etcDir = $moduleReader->getModuleDir('etc', 'Training_Test');
        $this->_schema = $etcDir . '/test.xsd';
        $this->_perFileSchema = $etcDir . '/test.xsd';
    }

    /**
     * Get path to per file validation schema
     *
     * @return string|null
     */
    public function getPerFileSchema()
    {
        return $this->_schema;
    }

    /**
     * Get path to merged config schema
     *
     * @return string|null
     */
    public function getSchema()
    {
        return $this->_perFileSchema;
    }
}
