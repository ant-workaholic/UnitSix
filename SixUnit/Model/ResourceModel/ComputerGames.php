<?php
namespace Training\SixUnit\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\AbstractResource;
use Training\SixUnit\Api\Data\ComputerGamesInterfaceFactory;
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
