<?php
namespace Gyman\Application\Repository;

use Gyman\Domain\Member\Details\Barcode;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\Member;

interface MemberRepositoryInterface extends RepositoryInterface
{
    public function findAll();

    public function findOneByEmailAddress(EmailAddress $email) : ?Member;

    public function remove(Member $member) : void;

    public function insert(Member $member) : void;

    public function save(Member $member) : void;

    public function findOneByBarcode(Barcode $barcode) : ?Member;
}
