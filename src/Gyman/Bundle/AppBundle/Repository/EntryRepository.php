<?php
namespace Gyman\Bundle\AppBundle\Repository;

use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Domain\Entry;
use Traversable;

/**
 * EntryRepository
 */
class EntryRepository extends EntityRepository implements EntryRepositoryInterface
{
    /**
     * @param Entry $entry
     */
    public function remove(Entry $entry)
    {
        $em = $this->getEntityManager();
        $em->remove($entry);
        $em->flush();
    }

    public function save($entries)
    {
        $em = $this->getEntityManager();

        if($entries instanceof Entry) {
            $em->persist($entries);
            $em->flush($entries);

            return;
        } elseif(is_array($entries) || $entries instanceof Traversable) {
            /** @var Entry $entry */
            foreach($entries as $entry) {
                $em->persist($entry);
            }

            $em->flush();

            return;
        }

        throw new \Exception("Argument is unknown type! Should be Entry class or collection/array of Entry class!");
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
                        ->join('e.occurrence', 'o')
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
