<?php
namespace Training\SixUnit\Model;

use Magento\Framework\DataObject;
use Training\SixUnit\Api\Data\ComputerGamesInterfaceFactory;

class ComputerGames extends \Magento\Framework\Model\AbstractModel
{
    /**
     * @var \Training\SixUnit\Api\Data\ComputerGamesInterfaceFactory
     */
    protected $computerGamesDataFactory;

    /**
     * @var \Magento\Framework\Api\DataObjectHelper
     */
    protected $objectHelper;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     * @param ComputerGamesInterfaceFactory $computerGamesData
     * @param \Magento\Framework\Api\DataObjectHelper $objectHelper
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [],
        ComputerGamesInterfaceFactory $computerGamesData,
        \Magento\Framework\Api\DataObjectHelper $objectHelper
    )
    {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
        $this->computerGamesDataFactory = $computerGamesData;
        $this->objectHelper = $objectHelper;
    }

    protected function _construct()
    {
        $this->_init('Training\SixUnit\Model\ResourceModel\ComputerGames');
    }

    /**
     * @return mixed
     */
    public function getDataModel()
    {
        $computersData = $this->getData();
        $gamesDataObject = $this->computerGamesDataFactory->create();
        $this->objectHelper->populateWithArray(
            $gamesDataObject,
            $computersData,
            '\Training\SixUnit\Api\Data\ComputerGamesInterface'
        );
        $gamesDataObject->setId($this->getId());
        return $gamesDataObject;
    }
}
