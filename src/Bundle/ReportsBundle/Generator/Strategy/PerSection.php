<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Carbon\Carbon;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\VoucherRepositoryInterface;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Domain\Entry;

/**
 * Class PerSection.
 */
class PerSection extends AbstractStrategy
{
    /** @var VoucherRepositoryInterface */
    private $vouchersRepository;

    /** @var EntryRepositoryInterface */
    private $entriesRepository;

    /**
     * PerSection constructor.
     *
     * @param VoucherRepositoryInterface $vouchersRepository
     * @param EntryRepositoryInterface   $entriesRepository
     */
    public function __construct(VoucherRepositoryInterface $vouchersRepository, EntryRepositoryInterface $entriesRepository)
    {
        $this->vouchersRepository = $vouchersRepository;
        $this->entriesRepository = $entriesRepository;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'per-section';
    }

    /**
     * @param DateFilter $filter
     *
     * @return array
     */
    public function result(DateFilter $filter)
    {
        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
        $endDate = Carbon::instance($filter->endDate)->setTime(23, 59, 59);

        $queryBuilderVouchers = $this->vouchersRepository->createQueryBuilder('v');

        $queryBuilderVouchers
            ->select('v.price.amount as price, s.title as section, v.startDate')
            ->leftJoin('v.member', 'm')
            ->leftJoin('m.sections', 's')
            ->where('v.createdAt > :startDate')
            ->andWhere('v.createdAt < :endDate')
            ->andWhere('v.price.amount is not null')
            ->setParameters([
                'startDate' => $startDate,
                'endDate'   => $endDate,
            ])
        ;

        $vouchersData = $queryBuilderVouchers->getQuery()->getArrayResult();
        $vouchersSum = array_sum(array_column($vouchersData, 'price'));

        $queryBuilderEntries = $this->entriesRepository->createQueryBuilder('e');

        $queryBuilderEntries
            ->select('e.price.amount as price, s.title as section, e.startDate')
            ->leftJoin('e.member', 'm')
            ->leftJoin('m.sections', 's')
            ->where('e.createdAt > :startDate')
            ->andWhere('e.createdAt < :endDate')
            ->andWhere('e.price.amount is not null')
            ->andWhere('e.type = :type')
            ->setParameters([
                'startDate' => $startDate,
                'endDate'   => $endDate,
                'type'      => Entry::TYPE_PAID,
            ])
        ;

        $entriesData = $queryBuilderEntries->getQuery()->getArrayResult();
        $entriesSum = array_sum(array_column($entriesData, 'price'));

        $process = function ($data = [], $result = []) {
            foreach ($data as $row) {
                $hash = md5($row['section']);

                if (isset($result[$hash])) {
                    $vouchersSum = $result[$hash]['sum'];
                    $vouchersSum += (float) ($row['price']);
                } else {
                    $vouchersSum = (float) ($row['price']);
                }
                $result[$hash] = ['title' => null === $row['section'] ? 'brak kategorii' : $row['section'], 'sum' => $vouchersSum];
            }

            return $result;
        };

        $result = $process($entriesData, $process($vouchersData, []));

        $sum = $vouchersSum + $entriesSum;

        return [
            'rows' => $result,
            'sum'  => $sum,
        ];
    }
}
