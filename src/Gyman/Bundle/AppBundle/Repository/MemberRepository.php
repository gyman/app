<?php
namespace Gyman\Bundle\AppBundle\Repository;

use Carbon\Carbon;
use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Domain\User;
use Gyman\Application\Command\SearchMemberCommand;
use Gyman\Domain\Member;
use Gyman\Domain\Member\Details\Barcode;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Traversable;

/**
 * MemberRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * voucherRepository methods below.
 */
class MemberRepository extends EntityRepository implements MemberRepositoryInterface
{
    /**
     * @param EmailAddress $email
     * @return Member
     */
    public function findOneByEmailAddress(EmailAddress $emailAddress)
    {
        $qb = $this->createQueryBuilder('m');

        $query = $qb->where('m.email.email = :emailAddress')
            ->setParameter('emailAddress', $emailAddress->email())
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    public function findOneByInvitationToken(string $token)
    {
        $qb = $this->createQueryBuilder('m');

        $query = $qb->where('m.to = :token')
            ->setParameter('token', $token)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param Barcode $barcode
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Member
     */
    public function findOneByBarcode(Barcode $barcode)
    {
        $qb = $this->createQueryBuilder('m');

        $query = $qb->where('m.details.barcode.barcode = :barcode')
            ->setParameter('barcode', $barcode->barcode())
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * @param Member $member
     * @return mixed
     */
    public function remove($member)
    {
        $this->getEntityManager()->remove($member);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Member $member
     * @return null
     */
    public function insert($member)
    {
        $this->getEntityManager()->persist($member);
        $this->getEntityManager()->flush();
    }

    /**
     * Get all Members query
     * @return Doctrine\ORM\QueryBuilder
     */
    public function getQuery()
    {
        $query = $this->createQueryBuilder('m');

        return $query;
    }

    public function getDashboardSearchQueryBuilder()
    {
        return $this->createQueryBuilder('m');
    }

    public function getTotalCount()
    {
        $query = $this->getQuery();
        $query->select('count(m.id)');

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
        $query->andWhere('m.deletedAt is null');
    }

    /**
     * @param  QueryBuilder $queryBuilder
     * @param  User         $user
     * @return QueryBuilder
     */
    public function getMembersForUser(QueryBuilder $queryBuilder, User $user)
    {
        $queryBuilder->innerJoin('m.sections', 's');
        $queryBuilder->innerJoin('s.club', 'c');
        $queryBuilder->andWhere(':user MEMBER OF c.owners');
        $queryBuilder->setParameter('user', $user);

        return $queryBuilder;
    }

    /**
     * @param string $query
     */
    public function search(SearchMemberCommand $command)
    {
        $qb = $this->createQueryBuilder('m');
        $expr = $qb->expr();

        if (!is_null($command->query)) {
            $qb->andWhere('m.details.firstname LIKE :queryLike')
                ->orWhere('m.details.lastname LIKE :queryLike')
                ->orWhere('LOWER(m.details.barcode.barcode) = :query')
                ->orWhere('LOWER(m.email.email) = :query')
                ->setParameter('queryLike', '%' . strtolower($command->query) . '%')
                ->setParameter('query', strtolower($command->query));
        }

        if (!is_null($command->section)) {
            $qb->join("m.sections", "s")
                ->andWhere("s.id = :section")
                ->setParameter('section', $command->section->id())
            ;
        }

        if (!is_null($command->hasOpenedEntry)) {
            $qb->join("m.lastEntry", "e");
            $column = "e.endDate";
            $qb->andWhere($expr->andX(
                boolval($command->hasOpenedEntry) ? $expr->isNull($column) : $expr->isNotNull($column)
            ));
        }

        if (!is_null($command->hasVoucher)) {
            $qb->andWhere(
                boolval($command->hasVoucher) ? $expr->isNotNull("m.currentVoucher") : $expr->isNull("m.currentVoucher")
            );
        }

        if (!is_null($command->starred)) {
            $qb->andWhere(
                $expr->eq("m.details.starred", true)
            );
        }

        if (!is_null($command->belt)) {
            $qb->andWhere("m.details.belt.color = :color")
                ->setParameter("color", $command->belt)
            ;
        }


        $query = $qb->getQuery();
        return $query->getResult();
    }

    /**
     * @param Member|Member[] $members
     * @throws \Exception
     */
    public function save($members){
        $em = $this->getEntityManager();

        if($members instanceof Member) {
            $em->persist($members);
            $em->flush($members);

            return;
        } elseif(is_array($members) || $members instanceof Traversable) {
            /** @var Member $member */
            foreach($members as $member) {
                $em->persist($member);
            }

            $em->flush();

            return;
        }

        throw new \Exception("Argument is unknown type! Should be Member class or collection/array of Member class!");
    }

    /**
     * @return array|Member[]
     */
    public function findAllByExpiredCurrentVoucher(){
        $qb = $this->createQueryBuilder('m');
        $expr = $qb->expr();

        /*
        $qb->select()
            ->join("m.currentVoucher", "v")
            ->join("v.entries", "e")
            ->where($expr->andX(
                $expr->isNotNull("m.currentVoucher"),
                $expr->orX(
                    $expr->andX(
                        $expr->isNotNull("v.endDate"),
                        $expr->lt("v.endDate", ":now")
                    ),
                    $expr->andX(
                        $expr->isNotNull("v.maximumAmount"),
                        $expr->gte("COUNT(e.id)", "v.maximumAmount")
                    )
                )
            ))
            ->setParameter(":now", new DateTime("now"))
        ;

        */

        $sql = <<< SQL
SELECT
  COUNT(e2_.id) as used_entries,
  v1_.maximumAmount as maximum_voucher_entries,
  v1_.endDate as voucher_end_date,
  m0_.id as member_id
FROM members m0_
  INNER JOIN vouchers v1_ ON m0_.current_voucher_id = v1_.id
  LEFT JOIN entries e2_ ON v1_.id = e2_.voucher_id
WHERE
  m0_.deletedAt IS NULL 
  AND v1_.deletedAt IS NULL
  AND e2_.deletedAt IS NULL
GROUP BY current_voucher_id
HAVING 
  (
    maximum_voucher_entries IS NOT NULL
    AND used_entries >= maximum_voucher_entries
  )
  OR (voucher_end_date <= '%now%')
;
SQL;
        $sql = str_replace("%now%", (new DateTime("now"))->format("Y-m-d H:i:s"), $sql);

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findAllByExpiredLastEntry() {
        $query = $this->createQueryBuilder('m')
            ->innerJoin('m.lastEntry', 'e')
            ->innerJoin('e.occurrence', 'o')
            ->where('m.lastEntry IS NOT null')
            ->andWhere('e.startDate < :date')
            ->andWhere('e.endDate IS null')
            ->andWhere('o.endDate < :date')
            ->setParameters([
                "date" => Carbon::parse("now"),
            ])
            ->getQuery()
        ;

        return $query->getResult();
    }

    public function getAllNamesForAutocompletion() {
        $query = $this->createQueryBuilder('m')
            ->select('m.details.firstname', 'm.details.lastname', 'm.id')
            ->where('m.deletedAt IS null')
            ->getQuery()
        ;

        return $query->getArrayResult();
    }
}
