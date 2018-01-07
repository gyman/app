<?php

namespace Gyman\Infrastructure\Query;

use Doctrine\ORM\EntityManagerInterface;
use Gyman\Domain\Section;
use Gyman\Domain\User;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\Paginator;

class SectionQuery
{

    /** @var EntityManagerInterface */
    private $em;

    /** @var Paginator */
    private $paginator;

    public function __construct(EntityManagerInterface $em, Paginator $paginator)
    {
        $this->em = $em;
        $this->paginator = $paginator;
    }

    public function getAllPaginated(int $page = 1) : PaginationInterface
    {
        $qb = $this->em->getRepository(Section::class)->createQueryBuilder('u');
        $qb->where('u.deletedAt is null');

        return $this->paginator->paginate($qb->getQuery(), $page, 10);
    }
}