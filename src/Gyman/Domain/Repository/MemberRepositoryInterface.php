<?php

namespace Gyman\Domain\Repository;

use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Member;

interface MemberRepositoryInterface extends RepositoryInterface
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
    public function remove($member);

    /**
     * @param Member $member
     * @return null
     */
    public function insert($member);
}
