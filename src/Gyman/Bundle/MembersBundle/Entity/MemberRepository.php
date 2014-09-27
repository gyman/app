<?php

namespace Gyman\Bundle\MembersBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Bundle\ListsBundle\Entity\RepositoryListCompatible;
use Gyman\Bundle\UserBundle\Entity\User;

/**
 * MemberRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MemberRepository extends EntityRepository implements RepositoryListCompatible
{
    /**
     * Get all Members query
     * @return Doctrine\ORM\QueryBuilder
     */
    public function getQuery()
    {
        $query = $this->createQueryBuilder("m");

        return $query;
    }

    public function getDashboardSearchQueryBuilder()
    {
        return $this->createQueryBuilder("m");
    }

    public function getTotalCount()
    {
        $query = $this->getQuery();
        $query->select("count(m.id)");

        return $query->getQuery()->getSingleScalarResult();
    }

    public function getPaginator(QueryBuilder $query)
    {
        return new Paginator($query);
    }

    /**
     * @param QueryBuilder $query
     */
    public function setActiveCriteria(QueryBuilder $query)
    {
        $query->andWhere("m.deletedAt is null");
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param User $user
     * @return QueryBuilder
     */
    public function getMembersForUser(QueryBuilder $queryBuilder, User $user) {
        $queryBuilder->innerJoin("m.sections","s");
        $queryBuilder->innerJoin("s.club", "c");
        $queryBuilder->andWhere(":user MEMBER OF c.owners");
        $queryBuilder->setParameter("user", $user);

        return $queryBuilder;
    }
}