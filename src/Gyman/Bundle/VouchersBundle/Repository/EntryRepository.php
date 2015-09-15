<?php
namespace Gyman\Bundle\VouchersBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Bundle\ListsBundle\Entity\RepositoryListCompatible;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Repository\EntryRepositoryInterface;

/**
 * EntryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntryRepository extends EntityRepository implements RepositoryListCompatible, EntryRepositoryInterface
{
    /**
     * @param Entry $entry
     */
    public function remove(Entry $entry)
    {
        // TODO: Implement remove() method.
    }

    /**
     * @param Entry $entry
     */
    public function insert(Entry $entry)
    {
        // TODO: Implement insert() method.
    }

    public function getAllEntries()
    {
        return $this->createQueryBuilder('e')
                        ->getQuery()->execute();
    }

    /**
     *
     * @return QueryBuilder
     */
    public function getQuery()
    {
        return $this->createQueryBuilder('e');
    }

    public function getTotalCount()
    {
        $query = $this->getQuery();
        $query->select('count(e.id)');

        return $query->getQuery()->getSingleScalarResult();
    }

    public function getPaginator(QueryBuilder $query)
    {
        return new Paginator($query);
    }

    /**
     *
     * @return QueryBuilder
     */
    public function getCountByActivitiesQueryBuilder(DateTime $startDate, DateTime $endDate)
    {
        return $this->createQueryBuilder('e')
                        ->select([
                            'a.name',
                            'SUBSTRING(o.startDate,1,10) as date',
                            'count(e) as cnt',
                        ])
                        ->join('e.occurence', 'o')
                        ->join('o.event', 'ev')
                        ->join('ev.activity', 'a')
                        ->groupBy('date, a.name')
                        ->where('e.startDate > :start')
                        ->andWhere('e.endDate < :end or e.endDate is null')
                        ->setParameters([
                            'start' => $startDate,
                            'end'   => $endDate,
        ]);
    }

    public function getCountByActivities(DateTime $startDate, DateTime $endDate)
    {
        $query = $this->getCountByActivitiesQueryBuilder($startDate, $endDate);

        return $query->getQuery()->execute();
    }
}
