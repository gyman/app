<?php

namespace Gyman\Bundle\BaseBundle\EntityManager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class BaseManager
{
    /**
     * Holds the Doctrine entity manager for database interaction
     * @var EntityManager
     */
    protected $em;

    /**
     * The Fully-Qualified Class Name for our entity
     * @var string
     */
    protected $class;

    /**
     * Entity-specific repo, useful for finding entities, for example
     * @var EntityRepository
     */
    protected $repo;

    /**
     * Holds the Symfony2 event dispatcher service
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getEntityManager()
    {
        return $this->em;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository($this->class);
    }

    public function flush()
    {
        $this->em->flush();
    }

    public function persist($object)
    {
        $this->em->persist($object);
    }

    public function remove($object)
    {
        $this->em->remove($object);
    }

    public function create()
    {
        return new $this->class();
    }

    public function delete($object, $withFlush = true)
    {
        $this->remove($object);

        if ($withFlush) {
            $this->flush();
        }
    }

    public function save($object, $withFlush = true)
    {
        $this->persist($object);

        if ($withFlush) {
            $this->flush();
        }
    }
}
