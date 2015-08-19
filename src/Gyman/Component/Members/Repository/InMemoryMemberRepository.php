<?php

namespace Gyman\Component\Members\Repository;

use Gyman\Component\Members\Model\EmailAddress;
use Gyman\Component\Members\Model\Member;

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
    public function remove(Member $member)
    {
        unset($this->members[$member->email()->email()]);
    }

    /**
     * @param Member $member
     * @return null
     */
    public function insert(Member $member)
    {
        $this->members[$member->email()->email()] = $member;
    }
}
