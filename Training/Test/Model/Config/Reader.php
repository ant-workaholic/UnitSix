<?php
namespace Training\Test\Model\Config;

/**
 * Class Reader
 * @package Training\Test\Model\Config
 */
class Reader extends \Magento\Framework\Config\Reader\Filesystem
{
    /**
     * List of did attributes for merge
     *
     * @var array
     */
    protected $_idAttributes = [];

    /**
     * @param \Magento\Framework\Config\FileResolverInterface $fileResolver
     * @param Converter $converter
     * @param SchemaLocator $schemaLocator
     * @param \Magento\Framework\Config\ValidationStateInterface $validationState
     * @param string $fileName
     * @param array $idAttributes
     * @param string $domDocumentClass
     * @param string $defaultScope
     */
    function __construct(
        \Magento\Framework\Config\FileResolverInterface $fileResolver,
        \Training\Test\Model\Config\Converter $converter,
        \Training\Test\Model\Config\SchemaLocator $schemaLocator,
        \Magento\Framework\Config\ValidationStateInterface $validationState,
        $fileName = 'test.xml',
        $idAttributes = [],
        $domDocumentClass = 'Magento\Framework\Config\Dom',
        $defaultScope = 'global'
    ) {
        parent::__construct(
            $fileResolver,
            $converter,
            $schemaLocator,
            $validationState,
            $fileName,
            $idAttributes,
            $domDocumentClass,
            $defaultScope
        );
    }
}
