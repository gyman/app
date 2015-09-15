<?php
namespace Gyman\Domain\Tests\Context;

use Gyman\Domain\Model\User;
use Gyman\Domain\Model\UserInterface;

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
