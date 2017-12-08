<?php
namespace Gyman\Bundle\ReportsBundle\Generator\Strategy;

use Carbon\Carbon;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\VoucherRepositoryInterface;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Domain\Entry;
use Symfony\Component\Routing\RouterInterface;

/**
 * Class All
 * @package Gyman\Bundle\ReportsBundle\Generator\Strategy
 */
class All extends AbstractStrategy
{
    /** @var  VoucherRepositoryInterface */
    private $vouchersRepository;

    /** @var  EntryRepositoryInterface */
    private $entriesRepository;

    /** @var  RouterInterface */
    private $router;

    /**
     * All constructor.
     * @param VoucherRepositoryInterface $vouchersRepository
     * @param EntryRepositoryInterface $entriesRepository
     * @param RouterInterface $router
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
    public function getName(){
        return "all";
    }

    public function result(DateFilter $filter)
    {
        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
        $endDate = Carbon::instance($filter->endDate)->setTime(23, 59, 59);

        $queryBuilderVouchers = $this->vouchersRepository->createQueryBuilder("v");

        $queryBuilderVouchers
            ->select("v.price.amount as price, v.startDate, m.id as member_id, m.details.lastname as member_lastname, m.details.firstname as member_firstname, LOWER('karnet') as type, v.id as voucher_id")
            ->leftJoin("v.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("v.createdAt > :startDate")
            ->andWhere("v.createdAt < :endDate")
            ->andWhere("v.price.amount is not null")
            ->setParameters([
                "startDate" => $startDate,
                "endDate" => $endDate
            ])
        ;

        $vouchersData = $queryBuilderVouchers->getQuery()->getArrayResult();
        $vouchersSum = array_sum(array_column($vouchersData, "price"));

        $queryBuilderEntries = $this->entriesRepository->createQueryBuilder("e");

        $queryBuilderEntries
            ->select("e.price.amount as price, s.title as section, e.startDate, m.id as member_id, m.details.lastname as member_lastname, m.details.firstname as member_firstname, LOWER('entry') as type")
            ->leftJoin("e.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("e.createdAt > :startDate")
            ->andWhere("e.createdAt < :endDate")
            ->andWhere("e.price.amount is not null")
            ->andWhere("e.type = :type")
            ->setParameters([
                "startDate" => $startDate,
                "endDate" => $endDate,
                "type" => Entry::TYPE_PAID
            ])
        ;

        $entriesData = $queryBuilderEntries->getQuery()->getArrayResult();
        $entriesSum = array_sum(array_column($entriesData, "price"));

        $process = function ($data = [], $result = []) {
            foreach ($data as $row) {
                $cost = floatval($row["price"]);

//                if($row["type"] === "karnet") {
//                    // i'm reaally sorry for this, just temporary
//                    $row["type"] = sprintf('<a href="%s">karnet</a>', $this->router->generate("gyman_voucher_update", ["id" => $row["voucher_id"]]));
//                }

                $result[] = [
                    "title" => sprintf("%s %s [%s]", $row["member_lastname"], $row["member_firstname"], $row["type"]),
                    "sum" => $cost,
                    "route" => $this->router->generate("gyman_member_edit", ["id" => $row["member_id"]])
                ];
            }

            return $result;
        };

        $result = $process($entriesData, $process($vouchersData, []));

        $sum = $vouchersSum + $entriesSum;

        return [
            "rows" => $result,
            "sum" => $sum
        ];
    }
}
