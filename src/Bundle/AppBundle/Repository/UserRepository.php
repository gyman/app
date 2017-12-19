<?php
namespace Gyman\Bundle\AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Domain\User;
use Gyman\Domain\UserInterface;
use Ramsey\Uuid\UuidInterface;

/**
 * Class UserRepository
 * @package Gyman\Bundle\ClubBundle\Entity
 * @method findOneByUsername(string $username)
 */
class UserRepository extends EntityRepository
{
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


    public function getByRolesQueryBuilder(array $roles) : Query
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

    /**
     * @return array|User[]
     */
    public function getInstructors() : array
    {
        return $this->getByRolesQueryBuilder(['ROLE_INSTRUCTOR'])->getResult();
    }

    /**
     * @return array|User[]
     */
    public function getAdministrators() : array
    {
        $query = $this->getByRolesQueryBuilder(['ROLE_ADMIN', 'ROLE_SUPER_ADMIN']);

        return $query->getResult();
    }

    public function findOneById(UuidInterface $instructorId) : ?User
    {
        return $this->findOneBy(["id" => $instructorId->toString()]);
    }
}
