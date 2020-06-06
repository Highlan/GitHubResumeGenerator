<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\RepositoriesInterface;
use Traversable;

class Repositories implements \Countable, \IteratorAggregate, RepositoriesInterface
{
    private $repositories;


    public function __construct(Repository ...$repositories) {
        $this->repositories = $repositories;
    }


    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function getRepositories()
    {
        // TODO: Implement getRepositories() method.
    }

    public function getLanguages()
    {
        // TODO: Implement getLanguages() method.
    }
}