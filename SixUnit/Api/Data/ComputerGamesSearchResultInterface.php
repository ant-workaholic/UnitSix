<?php
namespace Training\SixUnit\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface ComputerGamesSearchResultInterface
 * @package Training\SixUnit\Api\Data
 */
interface ComputerGamesSearchResultInterface extends SearchResultsInterface
{
    /**
     * @param \Training\SixUnit\Api\Data\ComputerGamesInterface[] $items
     * @return $this
     */
    public function setItems(array $items);

    /**
     * @return \Training\SixUnit\Api\Data\ComputerGamesInterface[]
     */
    public function getItems();
}
