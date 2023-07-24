<?php

namespace WebApp\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;

class ApiServices {

    protected $apiBaseUri;
    protected $token;
    protected $client;

    function __construct($authData = null) {
        $secretconf = require 'WebApp/Config/secretconf.php';
        $this->apiBaseUri = $secretconf['apiUrl'];
        $this->client = new Client([
            'base_uri' => $this->apiBaseUri,
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        if(isset($_SESSION['authenticated']['token']))
            $this->token = $_SESSION['authenticated']['token'];
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
                $_SESSION['authenticated']['token'] = $responseData['token'];
                return $responseData['token'];
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    function sendGetRequest($endpoint, $queryParams = []) {

        try {
            
            $response = $this->client->get('api/v1/' . $endpoint, [
                RequestOptions::HEADERS => [
                    'Authorization' => 'Bearer ' . $this->token,
                ],
                RequestOptions::QUERY => $queryParams,
            ]);
            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            // Обробка помилки запиту
            return null;
        }
    }
}