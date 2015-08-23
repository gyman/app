<?php

namespace Gyman\Component\CoreDomain\Tests;
use Gyman\Component\CoreDomain\Model\User;
use Gyman\Component\CoreDomain\Model\UserInterface;

/**
 * Class LoggedAsAdministratorTrait
 * @package Gyman\Component\Members
 */
trait LoggedAsAdministratorTrait
{
    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @Given /^I'm logged in as administrator$/
     */
    public function iMLoggedInAsAdministrator()
    {
        $user = new User();
        $user->id = 1;
        $user->email = 'administrator@email.com';

        $this->user = $user;
    }
}
