<?php
namespace Gyman\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\User;
use Gyman\Domain\UserInterface;

/**
 * Class UserRepository
 * @package Gyman\Bundle\ClubBundle\Entity
 * @method findOneByUsername(string $username)
 */
class UserRepository extends EntityRepository
{
    /**
     * @param EmailAddress $emailAddress
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return User|null
     */
    public function findOneByEmailAddress(EmailAddress $emailAddress)
    {
        $qb = $this->createQueryBuilder('u');

        $query = $qb->where('u.email = :emailAddress')
            ->setParameter('emailAddress', $emailAddress->email())
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    public function findOneByInvitationToken(string $token) : UserInterface
    {
        $qb = $this->createQueryBuilder('u');

        $query = $qb->where('u.invitationToken = :invitationToken')
            ->setParameter('invitationToken', $token)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param $roles
     * @return mixed
     */
    public function getAdministrators()
    {
        $query = $this->getByRolesQueryBuilder(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);

        return $query->getResult();
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getByRolesQueryBuilder(array $roles)
    {
        $qb = $this->createQueryBuilder('u');

        foreach ($roles as $k => $role) {
            $qb->orWhere('u.roles LIKE :param' . $k);
            $qb->setParameter('param' . $k, '%' . $role . '%');
        }

        $qb->distinct(true);

        return $qb->getQuery();
    }

    public function insert(User $user)
    {
        $this->_em->persist($user);
        $this->_em->flush($user);
    }
    public function update(User $user)
    {
        $this->_em->flush($user);
    }
}
