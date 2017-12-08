<?php

class EntityManager_48cada4 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder5a284bca7a066198558057 = null;
    private $initializer5a284bca7a07d318010311 = null;
    private static $publicProperties5a284bca7a019365997156 = [
        
    ];
    public function getConnection()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getConnection', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getMetadataFactory', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getExpressionBuilder', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'beginTransaction', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getCache', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getCache();
    }
    public function transactional($func)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'transactional', array('func' => $func), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->transactional($func);
    }
    public function commit()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'commit', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->commit();
    }
    public function rollback()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'rollback', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getClassMetadata', array('className' => $className), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'createQuery', array('dql' => $dql), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'createNamedQuery', array('name' => $name), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'createQueryBuilder', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'flush', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->flush($entity);
    }
    public function find($entityName, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'find', array('entityName' => $entityName, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->find($entityName, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'clear', array('entityName' => $entityName), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->clear($entityName);
    }
    public function close()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'close', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->close();
    }
    public function persist($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'persist', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'remove', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'refresh', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'detach', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'merge', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getRepository', array('entityName' => $entityName), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'contains', array('entity' => $entity), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getEventManager', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getConfiguration', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'isOpen', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getUnitOfWork', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getProxyFactory', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'initializeObject', array('obj' => $obj), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'getFilters', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'isFiltersStateClean', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'hasFilters', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return $this->valueHolder5a284bca7a066198558057->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?: $reflection = new \ReflectionClass(__CLASS__);
        $instance = (new \ReflectionClass(get_class()))->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer5a284bca7a07d318010311 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder5a284bca7a066198558057) {
            $reflection = $reflection ?: new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder5a284bca7a066198558057 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder5a284bca7a066198558057->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__get', ['name' => $name], $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        if (isset(self::$publicProperties5a284bca7a019365997156[$name])) {
            return $this->valueHolder5a284bca7a066198558057->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5a284bca7a066198558057;
            $backtrace = debug_backtrace(false);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    get_parent_class($this),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
            return;
        }
        $targetObject = $this->valueHolder5a284bca7a066198558057;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5a284bca7a066198558057;
            return $targetObject->$name = $value;
            return;
        }
        $targetObject = $this->valueHolder5a284bca7a066198558057;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__isset', array('name' => $name), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5a284bca7a066198558057;
            return isset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder5a284bca7a066198558057;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__unset', array('name' => $name), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5a284bca7a066198558057;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder5a284bca7a066198558057;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__clone', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        $this->valueHolder5a284bca7a066198558057 = clone $this->valueHolder5a284bca7a066198558057;
    }
    public function __sleep()
    {
        $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, '__sleep', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
        return array('valueHolder5a284bca7a066198558057');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer5a284bca7a07d318010311 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer5a284bca7a07d318010311;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer5a284bca7a07d318010311 && ($this->initializer5a284bca7a07d318010311->__invoke($valueHolder5a284bca7a066198558057, $this, 'initializeProxy', array(), $this->initializer5a284bca7a07d318010311) || 1) && $this->valueHolder5a284bca7a066198558057 = $valueHolder5a284bca7a066198558057;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder5a284bca7a066198558057;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder5a284bca7a066198558057;
    }
}
