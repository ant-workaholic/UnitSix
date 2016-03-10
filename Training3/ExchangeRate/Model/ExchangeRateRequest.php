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
    const DEFAULT_USD_URL = 'http://api.fixer.io/latest?base=USD';

    /**
     * @return bool|mixed
     */
    public function sendRequest()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_URL, self::DEFAULT_USD_URL);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        if ($result) {
            $decoded = json_decode($result);
            if ($decoded && $decoded->rates->EUR) {
                $this->setData(self::RESPONSE, $decoded);
            } else {
                $this->setData(self::RESPONSE, 'error');
            }
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
