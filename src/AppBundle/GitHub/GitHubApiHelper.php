<?php

namespace AppBundle\GitHub;


use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class GitHubApiHelper
{
    const BASE_URL = 'https://api.github.com/';
    const TOKEN = 'ef6e665f82731a97a3f226c73e1f54c82b72ec60';


    private $httpClient;

    public function __construct()
    {
        $this->httpClient = HttpClient::create(['headers' => [
            'Authorization'=> 'token ' . self::TOKEN
        ]]);
    }

    public function getUser($username)
    {
        return $this->request('GET', 'users/' . rawurlencode($username));
    }

    private function request(string $method, string $url,  array $option = [])
    {
        $response = $this->httpClient->request($method, self::BASE_URL . $url, $option);

        if ($response->getStatusCode() !== Response::HTTP_OK)
        {
            dump($response->getStatusCode() ); exit;
        }

        return $response->toArray();
    }

}