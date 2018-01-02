<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Context;

use Gyman\Domain\User;
use Gyman\Domain\UserInterface;

/**
 * Class LoggedAsAdministratorTrait.
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
