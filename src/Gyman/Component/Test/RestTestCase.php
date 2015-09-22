<?php

namespace Gyman\Component\Test;

use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;

class RestTestCase extends \PHPUnit_Framework_TestCase
{
    private $json;
    private $accessor;

    /**
     * @param string $json
     */
    public function __construct($json)
    {
        $this->json = $json;
        $this->accessor = PropertyAccess::createPropertyAccessor();
    }

    /**
     * @param string $path
     * @param mixed  $value
     */
    public function assertValueEquals($path, $value)
    {
        $propertyValue = $this->getValue($path);
        $this->assertEquals($value, $propertyValue, "Failed asserting that $propertyValue matches expected $value at path $path");
    }

    public function getValue($path)
    {
        return $this->accessor->getValue($this->json, $path);
    }

    /**
     * @param string $path
     */
    public function assertPathExists($path)
    {
        try {
            $this->getValue($path);
        } catch (NoSuchPropertyException $ex) {
            $this->fail("Path '$path' should be accessible in this json");
        }
    }

    public function assertPathEquals($path, $value)
    {
        $propertyValue = $this->getValue($path);
        $this->assertEquals($propertyValue, $value);
    }

    public function assertCountAtPath($path, $count)
    {
        $propertyValue = $this->getValue($path);
        $this->assertCount($count, get_object_vars($propertyValue));
    }

    /**
     * @param string $path
     */
    public function assertPathNotExists($path)
    {
        try {
            $this->getValue($path);
        } catch (NoSuchPropertyException $ex) {
            return;
        }
        $this->fail("Path '$path' shouldn't be accessible in this json");
    }
}
