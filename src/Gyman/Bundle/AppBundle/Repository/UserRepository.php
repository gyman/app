<?php
namespace Gyman\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Gyman\Bundle\AppBundle\Security\MemberUser;

class UserRepository extends EntityRepository
{
    public function insert(MemberUser $user)
    {
        $this->_em->persist($user);
        $this->_em->flush($user);
    }

    public function update(MemberUser $user)
    {
        $this->_em->flush($user);
    }
}