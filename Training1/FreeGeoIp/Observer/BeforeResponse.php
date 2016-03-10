<?php

namespace Training1\FreeGeoIp\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\Action\AbstractAction;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Training1\FreeGeoIp\Model\FreeGeoIp;
use Training1\FreeGeoIp\Model\FreeGeoIpFactory;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class BeforeResponse implements ObserverInterface
{
    protected $_freeGeoIp;

    protected $_remoteAddress;

    public function __construct(
        FreeGeoIpFactory $factory,
        RemoteAddress $remoteAddress
    ) {
        $this->_freeGeoIp = $factory->create();
        $this->_remoteAddress = $remoteAddress;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $data['remote_ip'] = $this->_remoteAddress->getRemoteAddress(true);
        $data['remote_url'] = 'http://freegeoip.net/json/';
        $response = $this->_freeGeoIp->sendRequest($data);
        $response = json_decode($response);
    }

}