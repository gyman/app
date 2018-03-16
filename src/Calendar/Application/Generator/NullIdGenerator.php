<?php
namespace Gyman\Calendar\Application\Generator;

/**
 * Class NullIdGenerator.
 */
class NullIdGenerator implements IdGeneratorInterface
{
    /**
     * @return string
     */
    public function generateId()
    {
        return;
    }
}
