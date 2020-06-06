<?php

namespace AppBundle\Entity;


interface RepositoriesInterface
{
    public function getRepositories(): array;
    public function getLanguages(): array;
}