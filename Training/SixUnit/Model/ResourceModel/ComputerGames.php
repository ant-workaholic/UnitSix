<?php
namespace Training\SixUnit\Model\ResourceModel;

/**
 * Class ComputerGames
 * @package Training\SixUnit\Model\ResourceModel
 */
class ComputerGames extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('computer_games', 'game_id');
    }
}
