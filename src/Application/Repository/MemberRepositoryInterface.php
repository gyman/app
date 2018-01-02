<?php

declare(strict_types=1);

namespace Gyman\Application\Repository;

use Gyman\Domain\Member;
use Gyman\Domain\Member\EmailAddress;

interface MemberRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Member[]
     */
    public function findAll();

    /**
     * @param EmailAddress $email
     *
     * @return Member
     */
    public function findOneByEmailAddress(EmailAddress $email);

    /**
     * @param Member $member
     *
     * @return mixed
     */
    public function remove($member);

    /**
     * @param Member $member
     */
    public function insert($member);

    public function save($member);
}
