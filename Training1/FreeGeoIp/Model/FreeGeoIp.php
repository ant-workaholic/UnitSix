<?php
namespace Training1\FreeGeoIp\Model;
use \Training1\FreeGeoIp\Api\ExternalServiceInterface;

/**
 * Class FreeGeoIp
 * @package Training1\FreeGeoIp\Model
 */
class FreeGeoIp implements ExternalServiceInterface
{
    /**
     * Send request to external service
     *
     * @param $data
     * @return mixed
     */
    public function sendRequest($data)
    {
        if (isset($data['remote_ip'])) {
            $url = $data['remote_url'];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 5);
            $result = curl_exec($ch);
            return $result;
        }
        return false;
    }
}
