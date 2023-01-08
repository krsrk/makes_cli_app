<?php
namespace App\Utils\Http;

use GuzzleHttp\Client;

class HttpClient
{
    private $client;
    protected $responseBody;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function request(string $url, string $method='GET')
    {
        $response = $this->client->request($method, $url);
        $this->responseBody = $response->getBody();
        
        return $this;
    }

    public function responseToArray()
    {
        return json_decode($this->responseBody, TRUE);
    }
}