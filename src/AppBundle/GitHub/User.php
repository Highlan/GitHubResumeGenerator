<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\UserInterface;

class User implements UserInterface
{


    public function __construct()
    {

    }

    public function getUsername(): string
    {
        // TODO: Implement getUsername() method.
    }

    public function getBlog(): string
    {
        // TODO: Implement getBlog() method.
    }

    public function getRepositories(): array
    {
        // TODO: Implement getRepositories() method.
    }

    public function getLanguages(): array
    {
        // TODO: Implement getLanguages() method.
    }
}