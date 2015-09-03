<?php
namespace Gyman\Component\Members\Repository;

use Gyman\Component\CoreDomain\Repository\RepositoryInterface;
use Gyman\Component\Members\Model\EmailAddress;
use Gyman\Component\Members\Model\Member;

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
    public function findOneByEmailAddress($email);

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
