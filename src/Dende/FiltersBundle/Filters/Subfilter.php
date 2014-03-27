<?php

namespace Dende\FiltersBundle\Filters;

use Doctrine\ORM\QueryBuilder;

abstract class Subfilter {

    /**
     * subfilter options
     * @var array 
     */
    protected $options = array();
    protected $format = "Y-m-d H:i:s";

    public function getOptions() {
        return $this->options;
    }

    public function setOptions($options) {
        $this->options = $options;
    }

    protected function prep($param) {
        return $param;
    }

    public function applyFilterToQuery(QueryBuilder $query) {
        throw new \Exception("You should implement this method in filter class!");
    }

    public function getName() {
        return $this->name;
    }

    public function getLabel() {
        return $this->label;
    }

    protected function eq(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $qb->setParameter($this->prep("dateFrom"), $this->d1->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $this->d1->format("Y-m-d 23:59:59"));
    }

    protected function lt(QueryBuilder $qb) {
        $qb->andWhere($this->field . " < :date");
        $qb->setParameter($this->prep("date"), $this->d1->format("Y-m-d 00:00:00"));
    }

    protected function gt(QueryBuilder $qb) {
        $qb->andWhere($this->field . " > :date");
        $qb->setParameter("date", $this->d1->format("Y-m-d 23:59:59"));
    }

    protected function between(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $qb->setParameter($this->prep("dateFrom"), $this->d1->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $this->d2->format("Y-m-d 23:59:59"));
    }

    protected function notBetween(QueryBuilder $qb) {
        $qb->andWhere($this->field . " <= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " >= :" . $this->prep("dateTo"));

        $qb->setParameter($this->prep("dateFrom"), $this->d1->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $this->d2->format("Y-m-d 23:59:59"));
    }

    protected function today(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $today = new \DateTime();

        $qb->setParameter($this->prep("dateFrom"), $today->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $today->format("Y-m-d 23:59:59"));
    }

    protected function yesterday(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $yesterday = new \DateTime("yesterday");

        $qb->setParameter($this->prep("dateFrom"), $yesterday->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $yesterday->format("Y-m-d 23:59:59"));
    }

    protected function thisWeek(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $Y = date("Y");
        $W = (int) date("W");

        $first = date($this->format, strtotime(sprintf("%s-W%02d.-1", $Y, $W)));
        $last = date($this->format, strtotime(sprintf("%s-W%02d-0", $Y, $W + 1)));

        $firstDayOfWeek = new \DateTime($first);
        $lastDayOfWeek = new \DateTime($last);

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfWeek->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfWeek->format("Y-m-d 23:59:59"));
    }

    protected function lastWeek(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $Y = date("Y");
        $W = (int) date("W") - 1;

        $first = date($this->format, strtotime(sprintf("%s-W%02d.-1", $Y, $W)));
        $last = date($this->format, strtotime(sprintf("%s-W%02d-0", $Y, $W + 1)));

        $firstDayOfWeek = new \DateTime($first);
        $lastDayOfWeek = new \DateTime($last);

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfWeek->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfWeek->format("Y-m-d 23:59:59"));
    }

    protected function thisMonth(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $firstDayOfMonth = new \DateTime("first day of this month");
        $lastDayOfMonth = new \DateTime("last day of this month");

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfMonth->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfMonth->format("Y-m-d 23:59:59"));
    }

    protected function lastMonth(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $firstDayOfMonth = new \DateTime("first day of previous month");
        $lastDayOfMonth = new \DateTime("last day of previous month");

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfMonth->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfMonth->format("Y-m-d 23:59:59"));
    }

    protected function thisYear(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $firstDayOfYear = new \DateTime("Y-01-01");
        $lastDayOfYear = new \DateTime("Y-12-31");

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfYear->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfYear->format("Y-m-d 23:59:59"));
    }

    protected function lastYear(QueryBuilder $qb) {
        $qb->andWhere($this->field . " >= :" . $this->prep("dateFrom"));
        $qb->andWhere($this->field . " <= :" . $this->prep("dateTo"));

        $firstDayOfYear = new \DateTime(date("Y-01-01", strtotime("-1 year")));
        $lastDayOfYear = new \DateTime(date("Y-12-31", strtotime("-1 year")));

        $qb->setParameter($this->prep("dateFrom"), $firstDayOfYear->format("Y-m-d 00:00:00"));
        $qb->setParameter($this->prep("dateTo"), $lastDayOfYear->format("Y-m-d 23:59:59"));
    }

}
