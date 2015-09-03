<?php
namespace Gyman\Component\Vouchers\Tests\Context;

use Gyman\Component\Members\Factory\MemberFactory;

/**
 * Class MemberExistsTrait
 * @package Gyman\Component\Vouchers
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
