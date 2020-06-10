<?php

namespace AppBundle\Entity;


interface RepositoryInterface
{
    public function getLanguage();
    public function getPopularity(): int;
}
