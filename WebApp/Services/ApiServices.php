<?php

namespace WebApp\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiServices {
    protected $apiBaseUri = 'http://cus-api.test';
    protected $token;
    protected $client;

    function __construct($authData = null) {
        $this->client = new Client([
            'base_uri' => $this->apiBaseUri,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    function authorize($authData) {
        try {
            $response = $this->client->post('/api/v1/login', [
                'form_params' => [
                    'email' => $authData['email'],
                    'password' => $authData['password'],
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $responseData = json_decode($response->getBody()->getContents(), true);

            if ($statusCode === 200 || $statusCode === 201 && isset($responseData['token'])) {
                $_SESSION['apitoken'] = $responseData['token'];
                return $responseData['token'];
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}