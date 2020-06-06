<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\UserInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class User implements UserInterface
{
    private $helper;
    private $username;
    private $blog;
    private $repositories;


    public function __construct(GitHubApiHelper $helper, RequestStack $request)
    {
        $username = $request->getCurrentRequest()->get('username');
        $this->helper = $helper;

        $user = $this->helper->getUser($username);
        $this->username = $user['login'];
        $this->blog = $user['blog'];

        $this->repositories = $this->helper->getRepositories($username);

    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getBlog(): string
    {
        return $this->blog;
    }

    /**
     * @return Repository[]
     */
    public function getRepositories(): array
    {
        return $this->repositories->getRepositories();
    }

    public function getLanguages(): array
    {
        // TODO: Implement getLanguages() method.
    }
}