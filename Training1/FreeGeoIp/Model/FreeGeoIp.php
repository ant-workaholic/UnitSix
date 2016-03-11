<?php
namespace Training1\FreeGeoIp\Model;
use \Training1\FreeGeoIp\Api\ExternalServiceInterface;
use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

/**
 * Class FreeGeoIp
 * @package Training1\FreeGeoIp\Model
 */
class FreeGeoIp implements ExternalServiceInterface
{
    const REMOTE_SERVICE_URL = 'http://freegeoip.net/json/';

    /**
     * @var \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress
     */
    protected $_remoteAddress;

    /**
     * @var string $_serviceUrl
     */
    protected $_serviceUrl;

    /**
     * @param RemoteAddress $remoteAddress
     */
    function __construct(RemoteAddress $remoteAddress)
    {
        $this->_remoteAddress = $remoteAddress;
    }

    /**
     * @param $url
     * @return $this
     */
    public function setServiceUlr($url)
    {
        if ($url) {
            $this->_serviceUrl = $url;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getServiceUrl()
    {
        return $this->_serviceUrl;
    }

    /**
     * Send request to Geo Ip
     *
     * @return array|mixed|string
     */
    public function sendRequest()
    {
        $remoteIp = $this->_remoteAddress->getRemoteAddress();
        if (!$this->_serviceUrl) {
            $this->_serviceUrl = self::REMOTE_SERVICE_URL . $remoteIp;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL, $this->_serviceUrl);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        if ($result) {
            $data = $this->_jsonDecode($result);
            if ($data) {
                $result = get_object_vars($data);
            } else {
                $result = '';
            }
        }
        return $result;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function _jsonDecode($data)
    {
        return json_decode($data);
    }
}
