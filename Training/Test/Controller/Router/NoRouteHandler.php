<?php
namespace Training\Test\Controller\Router;

class NoRouteHandler implements  \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $_config;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     */
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $config)
    {
        $this->_config = $config;
    }

    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $moduleName = 'cms';
        $actionPath = 'index';
        $actionName = 'index';

        $request->setModuleName($moduleName)->setControllerName($actionPath)->setActionName($actionName);

        return true;
    }
}
