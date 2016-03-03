<?php
namespace Training\Test\Block;

use Magento\Framework\View\Element\AbstractBlock;

/**
 * Class NewBlock
 * @package Training\Test\Block
 */
class NewBlock extends AbstractBlock
{
    /**
     * @return string
     */
    protected function _toHtml()
    {
        $html = '';
        $html .= '<h1> Hello this is a new block </h1>';
        return $html;
    }
}
