<?php

namespace AppBundle\GitHub;


use AppBundle\Exception\ApiLimitExceedException;
use AppBundle\Exception\GitHubApiException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\ResponseInterface;

class ExceptionThrower
{
    public static function throw(ResponseInterface $response)
    {
        if ($response->getStatusCode() == Response::HTTP_NOT_FOUND) {
            throw new GitHubApiException('The user you requested was not found. Please check your spelling and try again.', $response->getStatusCode());
        }

        if(strpos($response->getInfo('response_headers')[0], 'rate limit exceeded')) {
            throw new ApiLimitExceedException('You have reached GitHub hourly limit!', $response->getStatusCode());
        }


        throw new GitHubApiException('Error on getting data!', $response->getStatusCode());
    }
}
