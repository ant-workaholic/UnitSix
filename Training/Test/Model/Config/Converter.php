<?php
namespace Training\Test\Model\Config;

/**
 * Class Converter
 * @package Training\Test\Model\Config
 */
class Converter implements \Magento\Framework\Config\ConverterInterface
{
    /**
     * Convert config
     *
     * @param \DOMDocument $source
     * @return array
     */
    public function convert($source)
    {
        $output = [];

        foreach ($source->getElementsByTagName('mynode') as $node) {
            $output[] = $node->textContent;
        }
        return $output;
    }

}