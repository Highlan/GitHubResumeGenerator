<?php

namespace AppBundle\GitHub;


class Repository
{
    private $name;
    private $language;
    private $link;
    private $description;
    private $watchers;
    private $forks;

    public function __construct($name, $language, $link, $description, $watchers, $forks)
    {
        $this->name = $name;
        $this->language = $language;
        $this->link = $link;
        $this->description = $description;
        $this->watchers = $watchers;
        $this->forks = $forks;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string | null
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return mixed
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string | null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getWatchers(): int
    {
        return $this->watchers;
    }

    /**
     * @return mixed
     */
    public function getForks(): int
    {
        return $this->forks;
    }

    public function getPopularity() : int
    {
        return $this->forks + $this->watchers;
    }


}