<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\RepositoriesInterface;
use AppBundle\Entity\RepositoryInterface;
use AppBundle\Service\Math;

class Repositories implements \Countable, \IteratorAggregate, RepositoriesInterface
{
    const REPOSITORIES_MOST_POPULAR_LIMIT = 5;
    const LANGUAGES_MOST_USED_LIMIT = 9;


    private $repositories;
    private $languages;


    public function __construct(RepositoryInterface ...$repositories) {
        $this->repositories = $repositories;
    }


    public function getIterator()
    {
        return new \ArrayIterator($this->repositories);
    }

    public function count()
    {
        return sizeof($this->repositories);
    }

    /**
     * @return Repository[]
     */
    public function getRepositories($limit = self::REPOSITORIES_MOST_POPULAR_LIMIT): array
    {
        $this->sortRepositoriesByPopularity();
        return $this->separateTopBy($this->repositories, $limit);
    }

    public function getLanguages($limit = self::LANGUAGES_MOST_USED_LIMIT): array
    {
        $this->languages = array();

        foreach ($this->repositories as $repository)
        {
            if (is_null($repository->getLanguage()))
            {
                continue;
            }

            if (key_exists($repository->getLanguage(), $this->languages))
            {
                $this->languages[$repository->getLanguage()]++;
            }
            else
            {
                $this->languages[$repository->getLanguage()] = 1;
            }
        }

        $this->calculateLanguagesUsagePercentage();
        $this->sortLanguagesByUsage();

        return $this->separateTopBy($this->languages, $limit);
    }


    private function sortRepositoriesByPopularity(): void
    {
        usort($this->repositories, function($repo1, $repo2) {
            return $repo2->getPopularity() <=> $repo1->getPopularity();
        });
    }
    private function calculateLanguagesUsagePercentage(): void
    {
        $total = array_sum($this->languages);
        $math = new Math();
        foreach ($this->languages as $key => &$language)
        {
            $language = $math->getPercentage($total, $language, 2);
        }
    }
    private function sortLanguagesByUsage(): void
    {
        arsort($this->languages);
    }
    private function separateTopBy(array $array, int $limit): array
    {
        return array_slice($array, 0, $limit);
    }
}