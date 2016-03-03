<?php

namespace Training\SixUnit\Model\ResourceModel;

use Magento\Framework\Api\SearchCriteriaInterface;
use Training\SixUnit\Api\ComputerGamesInterface;
use Training\SixUnit\Api\Data;
use Training\SixUnit\Model\ResourceModel\ComputerGames\CollectionFactory as CollectionFactory;
use Training\SixUnit\Model\ResourceModel\ComputerGames as ResourceModel;
use Training\SixUnit\Model\ComputerGamesFactory;

class ComputerGamesRepository implements \Training\SixUnit\Api\ComputerGamesRepositoryInterface
{
    /**
     * @var \Training\SixUnit\Api\Data\ComputerGamesSearchResultInterfaceFactory
     */
    protected $searchResultFactory;

    /**
     * @var ComputerGames\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var ComputerGames
     */
    protected $resourceModel;

    /**
     * @var \Training\SixUnit\Model\ComputerGamesFactory
     */
    protected $gamesFactory;

    /**
     * @param \Training\SixUnit\Api\Data\ComputerGamesSearchResultInterfaceFactory $computerGamesSearchResultInterfaceFactory
     * @param CollectionFactory $collectionFactory
     * @param ComputerGames $resourceModel
     * @param ComputerGamesFactory $gamesFactory
     */
    function __construct(
        \Training\SixUnit\Api\Data\ComputerGamesSearchResultInterfaceFactory $computerGamesSearchResultInterfaceFactory,
        CollectionFactory $collectionFactory,
        ResourceModel $resourceModel,
        ComputerGamesFactory $gamesFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resourceModel = $resourceModel;
        $this->searchResultFactory = $computerGamesSearchResultInterfaceFactory;
        $this->gamesFactory = $gamesFactory;
    }

    /**
     * @param SearchCriteriaInterface $criteria
     * @return mixed
     */
    public function getList(SearchCriteriaInterface $criteria)
    {
        //TODO : Implement listing functionality
    }

    /**
     * @param $id
     * @return \Training\SixUnit\Api\Data\ComputerGamesInterface
     */
    public function getById($id)
    {
        /** @var \Training\SixUnit\Model\ComputerGames $model */
        $model = $this->gamesFactory->create()->load($id);
        return $model->getDataModel();
    }

    /**
     * @param \Training\SixUnit\Api\Data\ComputerGamesInterface $item
     * @return \Training\SixUnit\Api\Data\ComputerGamesInterface
     */
    public function save(\Training\SixUnit\Api\Data\ComputerGamesInterface$item)
    {
        $this->resourceModel->save($item);
        return $item;
    }

    /**
     * @param Data\ComputerGamesInterface $item
     * @return mixed
     */
    public function delete(Data\ComputerGamesInterface $item)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id)
    {
        return $this->resourceModel->delete($this->getById($id));
    }
}
