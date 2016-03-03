<?php
namespace Training\Test\Model;

use \Training\Test\Model\Config\ConfigInterface as ConfigInterface;
use \Magento\Framework\Config\Data;

/**
 * Class Config
 * @package Training\Test\Model
 */
class Config extends Data implements ConfigInterface
{
    function __construct(
        \Training\Test\Model\Config\Reader $reader,
        \Magento\Framework\Config\CacheInterface $cache,
        $cacheId = 'training_test_config'
    )
    {
        parent::__construct($reader, $cache, $cacheId);
    }

    public function getMyNodeInfo()
    {
         return $this->get();
    }
}
