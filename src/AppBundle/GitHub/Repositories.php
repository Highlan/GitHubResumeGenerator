<?php

namespace AppBundle\GitHub;


use AppBundle\Entity\RepositoriesInterface;
use Traversable;

class Repositories implements \Countable, \IteratorAggregate, RepositoriesInterface
{

    /**
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
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