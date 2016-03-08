<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Member;
use Gyman\Domain\Member\EmailAddress;

class InMemoryMemberRepository implements MemberRepositoryInterface
{
    /**
     * @var Member[]
     */
    private $members = [];

    /**
     * @return Member[]
     */
    public function findAll()
    {
        return $this->members;
    }

    /**
     * @param $email
     * @return Member
     */
    public function findOneByEmailAddress(EmailAddress $email)
    {
        $address = $email->email();

        return array_key_exists($address, $this->members) ? $this->members[$address] : null;
    }

    /**
     * @param Member $member
     * @return mixed
     */
    public function remove($member)
    {
        unset($this->members[$member->email()->email()]);
    }

    /**
     * @param Member $member
     * @return null
     */
    public function insert($member)
    {
        $this->members[$member->email()->email()] = $member;
    }
}
