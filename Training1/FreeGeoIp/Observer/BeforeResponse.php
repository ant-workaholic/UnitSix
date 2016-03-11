<?php

namespace Training1\FreeGeoIp\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

use Training1\FreeGeoIp\Model\FreeGeoIpFactory;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class BeforeResponse implements ObserverInterface
{
    /**
     * @var \Training1\FreeGeoIp\Model\FreeGeoIp
     */
    protected $_freeGeoIp;

    /**
     * @var \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress
     */
    protected $_remoteAddress;

    /**
     * @param FreeGeoIpFactory $factory
     * @param RemoteAddress $remoteAddress
     */
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
        $response = $this->_freeGeoIp->sendRequest();
        $result = "Can't find your country";
        if (isset($response['country_code'])) {
            $country = $response['country_code']? $response['country_code']: 'UA';
            $result = "Your country is: " . $country;
        }

        $response = $observer->getData('response');
        $response->appendBody($result);
    }
}
