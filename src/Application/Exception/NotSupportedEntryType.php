<?php

declare(strict_types=1);

namespace Gyman\Application\Exception;

class NotSupportedEntryType extends \Exception
{
    /**
     * NotSupportedEntryType constructor.
     *
     * @param mixed $type
     */
    public function __construct($type, array $availableTypes)
    {
        $this->message = sprintf('Not supported entry type "%s". Available types: [%s]', $type, implode(', ', $availableTypes));
    }
}
