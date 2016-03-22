<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\Member;

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

    public function save(Member $member);
}
