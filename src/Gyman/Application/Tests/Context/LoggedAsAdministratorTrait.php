<?php
namespace Gyman\Application\Tests\Context;

use Gyman\Bundle\ClubBundle\Entity\User;
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
        
        $user->setId(1);
        $user->setEmail('administrator@email.com');

        $this->user = $user;
    }
}
