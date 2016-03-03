<?php
namespace Training1\FreeGeoIp\Api;

interface ExternalServiceInterface {

    /**
     * Send request to external service
     *
     * @param $data
     * @return mixed
     */
    public function sendRequest($data);
}