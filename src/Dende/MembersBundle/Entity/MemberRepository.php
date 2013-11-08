<?php

namespace Dende\MembersBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * MemberRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MemberRepository extends EntityRepository {

    /**
     * Get all Members query
     * @return Doctrine\ORM\QueryBuilder
     */
    public function getMembersQuery() {
        $query = $this->createQueryBuilder("m")->select();
        return $query;
    }
}
