<?php
namespace Gyman\Domain\Tests\Context;

use Gyman\Domain\Factory\MemberFactory;

/**
 * Class MemberExistsTrait
 * @package Gyman\Domain
 */
trait MemberExistsTrait
{
    /**
     * @Given /^member \'([^\']*)\' exists$/
     */
    public function memberExists($email)
    {
        if (is_null($this->member)) {
            $this->member = MemberFactory::createFromArray([
                'email' => $email,
            ]);
        }
    }
}
