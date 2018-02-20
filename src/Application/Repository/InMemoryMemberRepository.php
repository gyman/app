<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Member;
use Gyman\Domain\Member\Details\Barcode;
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
    public function findOneByEmailAddress(EmailAddress $email) : ?Member
    {
        $address = $email->email();

        return array_key_exists($address, $this->members) ? $this->members[$address] : null;
    }

    public function remove(Member $member) : void
    {
        unset($this->members[$member->email()->email()]);
    }

    public function insert(Member $member) : void
    {
        $this->members[$member->email()->email()] = $member;
    }

    public function save(Member $member) : void
    {
        $this->insert($member);
    }

    abstract public function findOneByBarcode(Barcode $barcode): ?Member;
}
