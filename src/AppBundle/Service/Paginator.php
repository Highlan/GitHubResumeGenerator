<?php

namespace AppBundle\Service;


class Paginator
{
    const DEFAULT_PER_PAGE = 10;


    private $page;
    private $perPage;
    private $fetchedValuesSize;

    public function __construct()
    {
        $this->page = 1;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return mixed
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param mixed $perPage
     */
    public function setPerPage(int $perPage): void
    {
        $this->perPage = $perPage;
    }

    public function goNext(): void
    {
        $this->page++;
    }

    public function setFetchedValuesSize(int $size): void
    {
        $this->fetchedValuesSize = $size;
    }

    public function hasNext(): bool
    {
        return $this->fetchedValuesSize == $this->perPage;
    }
}
