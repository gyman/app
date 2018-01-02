<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Context;

use Gyman\Application\Factory\MemberFactory;

/**
 * Class MemberExistsTrait.
 */
trait MemberExistsTrait
{
    /**
     * @Given /^member \'([^\']*)\' exists$/
     *
     * @param mixed $email
     */
    public function memberExists($email)
    {
        if (null === $this->member) {
            $this->member = MemberFactory::createFromArray([
                'email' => $email,
            ]);
        }
    }
}
