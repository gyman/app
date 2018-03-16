<?php
namespace Gyman\Calendar\Application\Generator\InMemory;

use Gyman\Calendar\Application\Generator\IdGeneratorInterface;

/**
 * Class IdGenerator.
 */
final class IdGenerator implements IdGeneratorInterface
{
    /**
     * @return bool|mixed|string
     */
    public function generateId()
    {
        return uniqid();
    }
}
