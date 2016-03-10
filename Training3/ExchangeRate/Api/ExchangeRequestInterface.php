<?php
namespace Training3\ExchangeRate\Api;

/**
 * Interface ExchangeRequestInterface
 *
 * @package Training3\ExchangeRate\Api
 */
interface ExchangeRequestInterface
{
    const SERVICE_URL = 'service_url';
    const RESPONSE = 'response';

    /**
     * @return mixed
     */
    public function sendRequest();

    /**
     * @return mixed
     */
    public function getResponseData();
}
