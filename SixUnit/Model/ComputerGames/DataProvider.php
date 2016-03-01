<?php
namespace Training\SixUnit\Model\ComputerGames;
use Training\SixUnit\Model\ResourceModel\ComputerGames\CollectionFactory;
use Magento\Framework\View\Element\UiComponent\DataProvider\FilterPool;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Training\SixUnit\Model\ResourceModel\ComputerGames\Collection
     */
    protected $collection;
    /**
     * @var FilterPool
     */
    protected $filterPool;
    /**
     * @var array
     */
    protected $loadedData;
    /**
     * Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $locationCollectionFactory
     * @param FilterPool $filterPool
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $locationCollectionFactory,
        FilterPool $filterPool,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $locationCollectionFactory->create();
        $this->filterPool = $filterPool;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();

        foreach ($items as $game) {
            $this->loadedData[$game->getGameId()] = $game->getData();
        }
        return $this->loadedData;
    }
}
