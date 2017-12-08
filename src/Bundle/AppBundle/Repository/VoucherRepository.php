<?php
namespace Gyman\Bundle\AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\VoucherRepositoryInterface;

class VoucherRepository extends EntityRepository implements VoucherRepositoryInterface
{
    /**
     * @param Voucher $voucher
     * @return mixed
     */
    public function remove($voucher)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param Voucher $voucher
     * @return null
     */
    public function insert($voucher)
    {
        // TODO: Implement insert() method.
    }

    public function getAllVouchers()
    {
        return $this->getQuery()
                ->orderBy('v.created', 'DESC')
                ->getQuery()->execute();
    }

    /**
     * Get all Vouchers query
     * @return Doctrine\ORM\QueryBuilder
     */
    public function getQuery()
    {
        $query = $this->createQueryBuilder('v');

        return $query;
    }

    public function getTotalCount()
    {
        $query = $this->getQuery();
        $query->select('count(v.id)');

        return $query->getQuery()->getSingleScalarResult();
    }

    public function getPaginator(QueryBuilder $query)
    {
        return new Paginator($query);
    }

    /**
     *
     * @param  \DateTime                                 $date
     * @param  Member $member
     * @return type
     */
    public function getVoucherActiveForDate(\DateTime $date, Member $member)
    {
        $query = $this->getQuery();
        $query->where('v.member = :member');
        $query->andWhere('v.startDate <= :moment');
        $query->andWhere('v.endDate >= :moment');
        $query->andWhere('v.closedAt IS null');
        $query->setParameters([
            'moment' => $date,
            'member' => $member,
        ]);

        return $query->getQuery()->getOneOrNullResult();
    }

    public function getCurrentVouchers(Member $member)
    {
        $query = $this->getQuery();
        $query->where('v.member = :member');
        $query->andWhere('v.startDate is null OR v.startDate < :moment');
        $query->andWhere('v.endDate is null OR v.endDate > :moment');
        $query->andWhere('v.amountLeft > 0 OR v.amountLeft is null');
        $query->andWhere('v.closedAt IS null');
        $query->setParameters([
            'moment' => new DateTime(),
            'member' => $member,
        ]);

        return $query->getQuery()->getOneOrNullResult();
    }

    /**
     * @param Voucher $voucher
     * @return null
     */
    public function save(Voucher $voucher)
    {
        $em = $this->getEntityManager();
        $em->persist($voucher);
        $em->flush($voucher);
    }


    /**
     * @return array|Voucher[]
     */
    public function findAllNotSetCurrentVouchers(){
        $qb = $this->createQueryBuilder('v');

        $qb->select('v')
            ->addSelect("COUNT(e.id) as HIDDEN entries_count")
            ->innerJoin("v.member", "m")
            ->leftJoin("v.entries", "e")
            ->where("m.currentVoucher IS null")
            ->andWhere("v.startDate <= :now AND v.endDate > :now")
            ->andWhere("v.closedAt IS NULL")
            ->groupBy("v.id")
            ->having("(v.maximumAmount IS NOT null AND entries_count < v.maximumAmount) OR v.maximumAmount IS null")
            ->setParameter("now", new DateTime())
        ;

        return $qb->getQuery()->getResult();
    }
}
