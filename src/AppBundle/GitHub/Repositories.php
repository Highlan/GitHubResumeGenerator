<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\RepositoriesInterface;

class Repositories implements \Countable, \IteratorAggregate, RepositoriesInterface
{
    const REPOSITORIES_MOST_POPULAR_LIMIT = 5;


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

    /**
     * @return Repository[]
     */
    public function getRepositories($limit = self::REPOSITORIES_MOST_POPULAR_LIMIT): array
    {
        $this->sortRepositoriesByPopularity();
        return $this->separateTopBy($this->repositories, $limit);
    }

    public function getLanguages()
    {
        // TODO: Implement getLanguages() method.
    }


    private function sortRepositoriesByPopularity(): void
    {
        usort($this->repositories, function($repo1, $repo2) {
            return $repo2->getPopularity() <=> $repo1->getPopularity();
        });
    }
    private function separateTopBy(array $array, int $limit): array
    {
        return array_slice($array, 0, $limit);
    }
}