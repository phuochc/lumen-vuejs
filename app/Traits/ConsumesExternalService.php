<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    /**
     * Send a request to any service
     * @param $method
     * @param $requestUrl
     * @param array $formParams
     * @param array $headers
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {dd(1);
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams, 'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}
