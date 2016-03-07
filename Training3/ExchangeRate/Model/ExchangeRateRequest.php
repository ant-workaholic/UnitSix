<?php
namespace Training3\ExchangeRate\Model;
use \Training3\ExchangeRate\Api\ExchangeRequestInterface;

/**
 * Class RateExchangeRequest
 *
 * @package Training3\ExchangeRate\Model
 *
 */
class ExchangeRateRequest extends
    \Magento\Framework\Api\AbstractSimpleObject
    implements ExchangeRequestInterface
{
    /**
     * Send request
     *
     * @param $data
     * @return bool
     */
    public function sendRequest($data)
    {
        $url = $data['service_url'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        if ($result) {
            $decoded = json_decode($result);
            $this->setData(self::RESPONSE, $decoded);
            return true;
        }
        return false;
    }

    /**
     * @return mixed|null
     */
    public function getResponseData()
    {
        return $this->_get(self::RESPONSE);
    }
}
