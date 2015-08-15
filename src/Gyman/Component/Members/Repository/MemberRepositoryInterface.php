<?php
namespace Gyman\Component\Members\Repository;

use Gyman\Component\Members\Model\EmailAddress;
use Gyman\Component\Members\Model\Member;

interface MemberRepositoryInterface
{
    /**
     * @return Member[]
     */
    public function findAll();

    /**
     * @param EmailAddress $email
     * @return Member
     */
    public function findOneByEmailAddress(EmailAddress $email);

    /**
     * @param Member $member
     * @return mixed
     */
    public function remove(Member $member);

    /**
     * @param Member $member
     * @return null
     */
    public function insert(Member $member);
}