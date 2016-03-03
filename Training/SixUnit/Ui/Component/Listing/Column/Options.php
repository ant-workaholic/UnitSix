<?php
namespace Training\SixUnit\Ui\Component\Listing\Column;

use Magento\Framework\Escaper;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable\Product\CollectionFactory;
use Magento\TestFramework\Event\Magento;
use Magento\Catalog\Api\Data;
use Magento\ConfigurableProduct\Model\Product\Type;

/**
 * Class Options
 * @package Training\SixUnit\Ui\Component\Listing\Column
 */
class Options implements OptionSourceInterface
{
    protected $_confCollectionFactory;

    protected $_optionsRepository;

    protected $_productRepository;

    protected $_options = array();

    protected $_searchCriteriaBuilder;

    protected $_connection;

    function __construct(CollectionFactory $collectionFactory,
        \Magento\ConfigurableProduct\Model\OptionRepository $repository,
        \Magento\Catalog\Model\ProductRepository $productRepository,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Magento\Framework\App\ResourceConnection $resourceConnection
    )
    {
        $this->_productRepository = $productRepository;
        $this->_confCollectionFactory = $collectionFactory;
        $this->_optionsRepository = $repository;
        $this->_searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->_connection = $resourceConnection;
    }

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        $res = $this->getOptionsCount();
        $this->_options[] = array('value' => '', 'label' => ' ');
        foreach ($res as $conf) {
            $item = array('value' => $conf['cnt'], 'label' => "{$conf['cnt']}");
            if (!in_array($item, $this->_options)) {
                $this->_options[] = $item;
            }
        }
        return $this->_options;
    }

    protected function getOptionsCount()
    {
        $connection = $this->_connection->getConnection();
        $tableName = $this->_connection
            ->getConnection()
            ->getTableName('catalog_product_super_attribute');
        $select = $connection->select()->from(
            array('attr' => $tableName),
            array('cnt'=> new \Zend_Db_Expr('COUNT(*)')
            )
        )
            ->group('product_id')
            ->order('cnt');
        $result = $connection->fetchAll($select);
        return $result;
    }
}
