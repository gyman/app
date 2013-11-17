<?php
namespace Gyman\Bundle\DefaultBundle\Services\Manager;

use Symfony\Component\DependencyInjection\Container;
use Doctrine\ORM\EntityManager as DocumentManager;

class BaseManager
{
    /**
     * Holds the Doctrine document manager
     * @var DocumentManager
     */
    protected $dm;

    /**
     * Document-specific repo, useful for finding and managing document
     * @var DocumentRepository
     */
    protected $repository;

    /**
     * The Fully-Qualified Class Name for document
     * @var string
     */
    protected $class;

    protected $serializer;

    protected $container;

    /**
     * Creates the instance of the corresponding Document Class
     *
     * @return $this->class
     */
    public function create()
    {
        $class = $this->class;
        $obj = new $class();

        return $obj;
    }

    /**
     * Persists the object(s) and flushes the document manager
     *
     * @param object|array $obj
     */
    public function save($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $o) {
                $this->persist($o);
            }
        } else {
            $this->persist($obj);
        }
        $this->flush();
    }

    /**
     * Deletes the object(s) and flushes the document manager
     *
     * @param object|array $obj
     */
    public function delete($obj)
    {
        if (is_array($obj)) {
            foreach ($obj as $o) {
                $this->dm->remove($o);
            }
        } else {
            $this->dm->remove($obj);
        }
        $this->dm->flush();
    }

    public function remove($obj)
    {
        return $this->dm->remove($obj);
    }
    /**
     * Refreshes an object
     *
     * @param $obj
     */
    public function refresh($obj)
    {
        $this->dm->refresh($obj);
    }

    /**
     * Persists an object
     *
     * @param $obj
     */
    public function persist($obj)
    {
        $this->dm->persist($obj);
    }

    /**
     * Flushes the document manager
     */
    public function flush($obj = null)
    {
        if ($obj != null) {
            $this->dm->flush($obj);
        } else {
            $this->dm->flush();
        }
    }

    /**
     * Finds the document by id
     * @param $id
     *
     * @return bool|object
     */
    public function find($id)
    {
        $obj = $this->repository->find($id);
        if (!is_object($obj)) {
            return false;
        }

        return $obj;
    }

    /**
     * Serializes the object set
     *
     * @param        $data
     * @param        $groups
     * @param string $type
     *
     * @return mixed
     */
    public function serialize($data, $groups, $type = 'json')
    {
        $serializer = $this->getContainer()->get('serializer');
        $serializeGroup = array_merge((array) "reference", $groups);
        $serializer->setGroups($serializeGroup);

        return $serializer->serialize($data, $type);
    }

    /**
     * Sets class
     *
     * @param string $class
     */
    public function setClass($class)
    {
        $this->dm = $this->container->get('doctrine.orm.default_entity_manager');
        $this->class = $class;
        $this->repository = $this->dm->getRepository($class);
    }

    /**
     * Returns the corresponding class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Sets document manager
     * @param DocumentManager $dm
     */
    public function setDm($dm)
    {
        $this->dm = $dm;
    }

    /**
     * Returns document manager
     *
     * @return DocumentManager
     */
    public function getDm()
    {
        return $this->dm;
    }

    /**
     * Sets the doctrine document repository
     *
     * @param \Doctrine\ODM\MongoDB\DocumentRepository $repository
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    /**
     * Returns the doctrine document repository
     *
     * @return \Doctrine\ODM\MongoDB\DocumentRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Sets serializer
     *
     * @param $serializer
     */
    public function setSerializer($serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Returns serializer
     *
     * @return mixed
     */
    public function getSerializer()
    {
        return $this->serializer;
    }

    /**
     * Sets/injects container
     *
     * @param Container $container
     */
    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Returns container
     *
     * @return Container container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Gets a service
     *
     * @param $service
     * @return object
     */
    public function get($service)
    {
        return $this->getContainer()->get($service);
    }
}
