<?php
namespace Training\FiveUnit\Model\ResourceModel;

/**
 * Class Comment
 * @package Training\FiveUnit\Model\ResourceModel
 */
class Comment extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('training_comment', 'id');
    }
}
