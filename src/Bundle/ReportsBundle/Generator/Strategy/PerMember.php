<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Carbon\Carbon;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\VoucherRepositoryInterface;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Domain\Entry;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class PerMember.
 */
class PerMember extends AbstractStrategy
{
    /** @var VoucherRepositoryInterface */
    private $vouchersRepository;

    /** @var EntryRepositoryInterface */
    private $entriesRepository;

    /** @var RouterInterface */
    private $router;

    /**
     * PerMember constructor.
     *
     * @param VoucherRepositoryInterface $vouchersRepository
     * @param EntryRepositoryInterface   $entriesRepository
     * @param RouterInterface            $router
     */
    public function __construct(VoucherRepositoryInterface $vouchersRepository, EntryRepositoryInterface $entriesRepository, RouterInterface $router)
    {
        $this->vouchersRepository = $vouchersRepository;
        $this->entriesRepository = $entriesRepository;
        $this->router = $router;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'per-member';
    }

    public function result(DateFilter $filter)
    {
        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
        $endDate = Carbon::instance($filter->endDate)->setTime(23, 59, 59);

        $queryBuilderVouchers = $this->vouchersRepository->createQueryBuilder('v');

        $queryBuilderVouchers
            ->select('v.price.amount as price, m.details.firstname as firstname, m.details.lastname as lastname, m.id as member_id')
            ->leftJoin('v.member', 'm')
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
            ->select('e.price.amount as price, m.details.firstname as firstname, m.details.lastname as lastname, m.id as member_id')
            ->leftJoin('e.member', 'm')
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
                $name = sprintf('%s %s', $row['firstname'], $row['lastname']);
                $hash = md5($name);

                if (isset($result[$hash])) {
                    $vouchersSum = $result[$hash]['sum'];
                    $vouchersSum += (float) ($row['price']);
                } else {
                    $vouchersSum = (float) ($row['price']);
                }
                $result[$hash] = [
                    'title' => null === $name ? 'anonimowy' : $name,
                    'sum'   => $vouchersSum,
                    'route' => $this->router->generate('gyman_member_edit', ['id' => $row['member_id']]),
                ];
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
