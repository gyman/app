<?php
namespace Gyman\Bundle\LandingPageBundle\Exception;

use Exception;

class CantRegisterNewClub extends Exception
{

    protected $message = "Can't create a new club";

    /**
     * CantRegisterNewClub constructor.
     * @param Exception $e
     */
    public function __construct(Exception $e)
    {
        parent::__construct($this->message, 0, $e);
    }
}