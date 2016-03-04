<?php
namespace Training2\Specific404Page\Router;

/**
 * Class NoRouteHandler
 * @package Training2\Specific404Page\Router
 */
class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $pathInfo = explode('/', ltrim($request->getPathInfo(),'/'));

        if ($pathInfo[0] == 'catalog'
            && $pathInfo[1] == 'product'
            && $pathInfo[2] == 'view'
            && $pathInfo[3] == 'id') {
            $request->setModuleName('specific')
                ->setControllerName('error')
                ->setActionName('product');
            return true;
        }
        if ($pathInfo[0] == 'catalog'
            && $pathInfo[1] == 'category'
            && $pathInfo[2] == 'view'
            && $pathInfo[3] == 'id') {
            $request->setModuleName('specific')
                ->setControllerName('error')
                ->setActionName('category');
            return true;
        }
    }
}
