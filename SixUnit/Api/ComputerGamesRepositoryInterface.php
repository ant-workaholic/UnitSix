<?php
namespace Training\SixUnit\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface ComputerGamesRepositoryInterface
 * @package Training\SixUnit\Api
 */
interface ComputerGamesRepositoryInterface
{
    /**
     * @param SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $criteria);

    /**
     * @param Data\ComputerGamesInterface $item
     * @return Data\ComputerGamesInterface
     */
    public function save(Data\ComputerGamesInterface $item);

    /**
     * @param $id
     * @return Data\ComputerGamesInterface
     */
    public function getById($id);
}
