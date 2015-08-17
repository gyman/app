<?php

namespace Gyman\Bundle\MultiDatabaseBundle\Exception;

class ClubNotFoundException extends \Exception
{
    /**
     * @param string $club
     */
    public function __construct($clubName)
    {
        $this->message = sprintf("Club '%s' not found.", $clubName);
    }
}
