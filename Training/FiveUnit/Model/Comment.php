<?php
namespace Training\FiveUnit\Model;
use Magento\Framework\Model\AbstractModel;
use Training\FiveUnit\Api\Data\CommentInterface;

/**
 * Class Comment
 * @package Training\FiveUnit\Model
 */
class Comment extends \Magento\Framework\Model\AbstractModel implements \Training\FiveUnit\Api\Data\CommentInterface
{
    protected function _construct()
    {
        $this->_init('Training\FiveUnit\Model\ResourceModel\Comment');
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @param int|mixed $value
     * @return $this|CommentInterface
     */
    public function setId($value)
    {
        return $this->setData(self::ID, $value);
    }

    /**
     * Get comment content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Get comment title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set comment content
     *
     * @param string $content
     * @return CommentInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Set comment title
     *
     * @param string $title
     * @return CommentInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
}
