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
    protected $entityManager;

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

    public function __construct(EntityManager $em, EventDispatcherInterface $dispatcher)
    {
        $this->entityManager = $em;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
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
        return $this->entityManager;
    }

    /**
     * @return EntityRepository
     */
    public function getRepository()
    {
        return $this->entityManager->getRepository($this->class);
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

    public function persist($object)
    {
        $this->entityManager->persist($object);
    }

    public function remove($object)
    {
        $this->entityManager->remove($object);
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
