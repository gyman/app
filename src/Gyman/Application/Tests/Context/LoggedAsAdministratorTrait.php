<?php
namespace Gyman\Application\Tests\Context;

use Gyman\Domain\User;
use Gyman\Domain\UserInterface;

/**
 * Class LoggedAsAdministratorTrait
 * @package Gyman\Domain
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
