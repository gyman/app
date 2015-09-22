<?php

namespace Gyman\Bundle\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

abstract class AbstractSubfilter implements FilterInterface, \ArrayAccess, \Iterator
{
    /**
     * subfilter options
     * @var array
     */
    public $options = [];

    /**
     * date format
     * @var string
     */
    protected $format = 'Y-m-d H:i:s';

    public function __construct()
    {
        $this->typeClass = "Gyman\Bundle\FiltersBundle\Form\Subfilters\\" . get_class($this) . 'Type';
    }

    public function call($method, $queryBuilder)
    {
        return $this->$method($queryBuilder);
    }

    public function apply(QueryBuilder $query)
    {
        throw new \Exception('You should implement this method in filter class!');
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->options);
    }

    public function offsetGet($offset)
    {
        if (array_key_exists($offset, $this->options)) {
            return $this->options[$offset];
        }
    }

    public function offsetSet($offset, $value)
    {
        $this->options[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->options[$offset]);
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    public function current()
    {
        return current($this->options);
    }

    public function key()
    {
        return key($this->options);
    }

    public function next()
    {
        return next($this->options);
    }

    public function rewind()
    {
        return reset($this->options);
    }

    public function valid()
    {
        return isset($this->options[$this->key()]);
    }
}
