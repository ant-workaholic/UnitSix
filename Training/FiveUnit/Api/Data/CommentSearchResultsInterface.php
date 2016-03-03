<?php
namespace Training\FiveUnit\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface CommentSearchResultsInterface
 * @package Training\FiveUnit\Api\Data
 * @api
 */
interface CommentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get comments list.
     *
     * @return \Training\FiveUnit\Api\Data\CommentInterface[]
     */
    public function getItems();

    /**
     * Set blocks list.
     *
     * @param \Training\FiveUnit\Api\Data\CommentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
