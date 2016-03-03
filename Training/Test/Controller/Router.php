<?php
namespace Training\Test\Controller;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;

class Router implements \Magento\Framework\App\RouterInterface
{
    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }
    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return ActionInterface
     */
    public function match(RequestInterface $request)
    {
        $info = $request->getPathInfo();
        if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
            $request->setPathInfo(sprintf("/%s/%s/%s", $m[1], $m[2], $m[3]));
            return $this->actionFactory->create('Magento\Framework\App\Action\Forward', ['request' => $request]);
        }
        return null;
    }
}
