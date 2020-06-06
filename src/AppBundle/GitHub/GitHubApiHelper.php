<?php

namespace AppBundle\GitHub;


use AppBundle\Service\Paginator;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class GitHubApiHelper
{
    const BASE_URL = 'https://api.github.com/';
    const TOKEN = 'ef6e665f82731a97a3f226c73e1f54c82b72ec60';
    const LIMIT_PER_PAGE = 100;


    private $httpClient;
    private $paginator;


    public function __construct(Paginator $paginator)
    {
        $this->httpClient = HttpClient::create(['headers' => [
            'Authorization'=> 'token ' . self::TOKEN
        ]]);

        $this->paginator = $paginator;
    }

    public function getUser($username)
    {
        return $this->request('GET', 'users/' . rawurlencode($username));
    }

    public function getRepositories($username) : Repositories
    {
        $repo = array();
        $this->paginator->setPage(1);
        $this->paginator->setPerPage(self::LIMIT_PER_PAGE);
        do
        {
            $repositories = $this->request(
                'GET',
                sprintf('users/%s/repos?per_page=%d&page=%d',
                    rawurlencode($username),
                    $this->paginator->getPerPage(),
                    $this->paginator->getPage()
                )
            );

            foreach ($repositories as $repository)
            {
                array_push(
                    $repo,
                    new Repository(
                        $repository['name'],
                        $repository['language'],
                        $repository['html_url'],
                        $repository['description'],
                        $repository['watchers'],
                        $repository['forks']
                    )
                );
            }

            $this->paginator->setFetchedValuesSize(sizeof($repositories));
            $this->paginator->goNext();

        } while ($this->paginator->hasNext());

        return new Repositories(...$repo);
    }

    private function request(string $method, string $url,  array $option = [])
    {
        $response = $this->httpClient->request($method, self::BASE_URL . $url, $option);

        if ($response->getStatusCode() !== Response::HTTP_OK)
        {
            ExceptionThrower::throw($response);
        }

        return $response->toArray();
    }

}