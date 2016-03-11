<?php
namespace Training1\FreeGeoIp\Api;

interface ExternalServiceInterface {

    /**
     * Send request to external service
     *
     * @return mixed
     */
    public function sendRequest();
}