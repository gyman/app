<?php
namespace Gyman\Bundle\FiltersBundle\Filters;

use DateTime;
use Doctrine\ORM\QueryBuilder;

abstract class DateFilter extends AbstractSubfilter
{
    public function apply(QueryBuilder $queryBuilder)
    {
        $this['date1'] = $this->fixDate($this['date1']);
        $this['date2'] = $this->fixDate($this['date2']);

        $this->{$this['type']}($queryBuilder);
    }

    protected function eq(QueryBuilder $queryBuilder)
    {
        $queryBuilder
            ->andWhere($this->getFieldName() . ' >= :dateFrom')
            ->andWhere($this->getFieldName() . ' <= :dateTo')
            ->setParameters([
                'dateFrom' => $this['date1']->format('Y-m-d 00:00:00'),
                'dateTo'   => $this['date1']->format('Y-m-d 23:59:59'),
        ]);
    }

    protected function lt(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' < :date');
        $queryBuilder->setParameter('date', $this['date1']->format('Y-m-d 00:00:00'));
    }

    protected function gt(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' > :date');
        $queryBuilder->setParameter('date', $this['date1']->format('Y-m-d 23:59:59'));
    }

    protected function between(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $queryBuilder->setParameter('dateFrom', $this['date1']->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $this['date2']->format('Y-m-d 23:59:59'));
    }

    protected function notBetween(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateTo');

        $queryBuilder->setParameter('dateFrom', $this['date1']->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $this['date2']->format('Y-m-d 23:59:59'));
    }

    protected function today(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $today = new DateTime();

        $queryBuilder->setParameter('dateFrom', $today->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $today->format('Y-m-d 23:59:59'));
    }

    protected function yesterday(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $yesterday = new DateTime('yesterday');

        $queryBuilder->setParameter('dateFrom', $yesterday->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $yesterday->format('Y-m-d 23:59:59'));
    }

    protected function thisWeek(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $Y = date('Y');
        $W = (int) date('W');

        $first = date($this->format, strtotime(sprintf('%s-W%02d.-1', $Y, $W)));
        $last = date($this->format, strtotime(sprintf('%s-W%02d-0', $Y, $W + 1)));

        $firstDayOfWeek = new DateTime($first);
        $lastDayOfWeek = new DateTime($last);

        $queryBuilder->setParameter('dateFrom', $firstDayOfWeek->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfWeek->format('Y-m-d 23:59:59'));
    }

    protected function lastWeek(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $Y = date('Y');
        $W = (int) date('W') - 1;

        $first = date($this->format, strtotime(sprintf('%s-W%02d.-1', $Y, $W)));
        $last = date($this->format, strtotime(sprintf('%s-W%02d-0', $Y, $W + 1)));

        $firstDayOfWeek = new DateTime($first);
        $lastDayOfWeek = new DateTime($last);

        $queryBuilder->setParameter('dateFrom', $firstDayOfWeek->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfWeek->format('Y-m-d 23:59:59'));
    }

    protected function thisMonth(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $firstDayOfMonth = new DateTime('first day of this month');
        $lastDayOfMonth = new DateTime('last day of this month');

        $queryBuilder->setParameter('dateFrom', $firstDayOfMonth->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfMonth->format('Y-m-d 23:59:59'));
    }

    protected function lastMonth(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $firstDayOfMonth = new DateTime('first day of previous month');
        $lastDayOfMonth = new DateTime('last day of previous month');

        $queryBuilder->setParameter('dateFrom', $firstDayOfMonth->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfMonth->format('Y-m-d 23:59:59'));
    }

    protected function thisYear(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $firstDayOfYear = new DateTime(date('Y-01-01'));
        $lastDayOfYear = new DateTime(date('Y-12-31'));

        $queryBuilder->setParameter('dateFrom', $firstDayOfYear->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfYear->format('Y-m-d 23:59:59'));
    }

    protected function lastYear(QueryBuilder $queryBuilder)
    {
        $queryBuilder->andWhere($this->getFieldName() . ' >= :dateFrom');
        $queryBuilder->andWhere($this->getFieldName() . ' <= :dateTo');

        $firstDayOfYear = new DateTime(date('Y-01-01', strtotime('-1 year')));
        $lastDayOfYear = new DateTime(date('Y-12-31', strtotime('-1 year')));

        $queryBuilder->setParameter('dateFrom', $firstDayOfYear->format('Y-m-d 00:00:00'));
        $queryBuilder->setParameter('dateTo', $lastDayOfYear->format('Y-m-d 23:59:59'));
    }

    protected function getFieldName()
    {
        return $this->field;
    }

    protected function fixDate($value = null)
    {
        if ($value instanceof DateTime) {
            return $value;
        }

        return new DateTime($value);
    }
}
