<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\Club\ORM;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\TestBundle\DataFixtures\BaseFixture;

class MembersData extends BaseFixture
{
    protected $dir = __DIR__;

    public function getOrder()
    {
        return 10;
    }

    public function insert($params)
    {
        extract($params);

        $member = new Member();
        $member->setBirthdate($birthdate);
        $member->setEmail($email);
        $member->setFoto($foto);
        $member->setGender($gender);
        $member->setName($name);
        $member->setNotes($notes);
        $member->setPhone($phone);
        $member->setZipcode($zipcode);
        $member->setBelt($belt);
        $member->setBarcode($barcode);

        $this->manager->persist($member);
        $this->manager->flush();

        return $member;
    }
}
