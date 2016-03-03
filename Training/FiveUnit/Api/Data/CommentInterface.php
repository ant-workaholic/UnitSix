<?php
namespace Training\FiveUnit\Api\Data;

/**
 * Interface CommentInterface
 * @package Training\FiveUnit\Api\Data
 * @api
 */
interface CommentInterface
{

    const ID = 'id';
    const TITLE = 'title';
    const CONTENT = 'content';

    /**
     * Get comment id
     * @return int
     */
    public function getId();

    /**
     * Set comment id
     *
     * @param int $id
     * @return CommentInterface
     */
    public function setId($id);

    /**
     * Get comment title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set comment title
     *
     * @param string $title
     * @return CommentInterface
     */
    public function setTitle($title);

    /**
     * Set comment content
     *
     * @param string $content
     * @return CommentInterface
     */
    public function setContent($content);

    /**
     * Get comment content
     *
     * @return string
     */
    public function getContent();
}