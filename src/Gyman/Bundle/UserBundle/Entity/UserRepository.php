<?php
namespace Gyman\Bundle\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gyman\Domain\Model\EmailAddress;

class UserRepository extends EntityRepository
{
    /**
     * @param EmailAddress $emailAddress
     * @return User|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByEmailAddress(EmailAddress $emailAddress)
    {
        $qb = $this->createQueryBuilder('u');

        $query = $qb->where('u.email = :emailAddress')
            ->setParameter('emailAddress', $emailAddress->email())
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
}
