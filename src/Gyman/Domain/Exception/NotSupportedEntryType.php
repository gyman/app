<?php
namespace Gyman\Domain\Exception;

class NotSupportedEntryType extends \Exception
{
    /**
     * NotSupportedEntryType constructor.
     */
    public function __construct($type, array $availableTypes)
    {
        $this->message = sprintf("Not supported entry type \"%s\". Available types: [%s]", $type, implode(", ", $availableTypes));
    }
}
