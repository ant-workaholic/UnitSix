<?php
namespace Training\FiveUnit\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface CommentRepositoryInterface
 * @package Training\FiveUnit\Api
 */
interface CommentRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $criteria
     * @return \Training\FiveUnit\Api\Data\CommentSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param $commentId
     * @return bool
     */
    public function deleteById($commentId);

    /**
     * @param Data\CommentInterface $comment
     * @return bool
     */
    public function delete(Data\CommentInterface $comment);

    /**
     * @param Data\CommentInterface $comment
     * @return Data\CommentInterface
     */
    public function save(Data\CommentInterface $comment);

    /**
     * @param $id
     * @return Data\CommentInterface
     */
    public function getById($id);
}
