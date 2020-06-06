<?php

namespace AppBundle\Entity;


interface UserInterface
{
    public function getUsername() : string;
    public function getBlog() : string;
    public function getRepositories(): array;
    public function getLanguages() : array;
}