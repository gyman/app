<?php

namespace Gyman\Bundle\TestBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Symfony\Component\Yaml\Yaml;

class MembersData extends AbstractFixture implements OrderedFixtureInterface
{
    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $value = Yaml::parse(file_get_contents(__DIR__.'/../Yaml/members.yml'));

        foreach ($value as $key => $params) {
            $memberObject = $this->insertMember($params);
            $this->addReference($key, $memberObject);
        }
    }

    public function getOrder()
    {
        return 10;
    }

    private function insertMember($params)
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
