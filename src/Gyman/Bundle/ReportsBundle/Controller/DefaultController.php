<?php
namespace Gyman\Bundle\ReportsBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Gyman\Bundle\AppBundle\Entity\Entry;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="gyman_reports_index")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {

    }

    /**
     * @Route("/per-section", name="gyman_reports_per_section")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function perSectionAction(Request $request)
    {
        $filter = new DateFilter(new DateTime("-1 month"), new DateTime("now"));
        $form = $this->createForm("reports_date_filter", $filter, [
            "method" => "GET"
        ]);

        $form->handleRequest($request);
        $filter = $form->getData();

        $startDate = Carbon::instance($filter->startDate)->setTime(0,0,0);
        $endDate = Carbon::instance($filter->endDate)->setTime(23, 59, 59);

        $queryBuilderVouchers = $this->get("gyman.vouchers.repository")->createQueryBuilder("v");

        $queryBuilderVouchers
            ->select("v.price.amount as price, s.title as section, v.startDate")
            ->leftJoin("v.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("v.startDate > :startDate")
            ->andWhere("v.startDate < :endDate")
            ->andWhere("v.price.amount is not null")
            ->setParameters([
                "startDate" => $startDate,
                "endDate" => $endDate
            ])
        ;

        $vouchersData = $queryBuilderVouchers->getQuery()->getArrayResult();
        $vouchersSum = array_sum(array_column($vouchersData, "price"));

        $queryBuilderEntries = $this->get("gyman.entries.repository")->createQueryBuilder("e");
        $queryBuilderEntries
            ->select("e.price.amount as price, s.title as section, e.startDate")
            ->leftJoin("e.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("e.startDate > :startDate")
            ->andWhere("e.startDate < :endDate")
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

        $process = function($data = [], $result = []) {
            foreach ($data as $row) {
                $hash = md5($row["section"]);

                if (isset($result[$hash])) {
                    $vouchersSum = $result[$hash]["sum"];
                    $vouchersSum += floatval($row["price"]);
                } else {
                    $vouchersSum = floatval($row["price"]);
                }
                $result[$hash] = ["title" => is_null($row["section"]) ? "brak kategorii" : $row["section"], "sum" => $vouchersSum];
            }

            return $result;
        };

        $result = $process($entriesData, $process($vouchersData, []));

        $sum = $vouchersSum + $entriesSum;

        $router = $this->get("router");
        
        $getLink = function(DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_per_section", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "submit" => null
                ]
            ]);
        };

        $todayLink = $getLink(Carbon::parse("today")->setTime(0,0,0), Carbon::parse("today"));
        $yesterdayLink = $getLink(Carbon::parse("yesterday")->setTime(0,0,0), Carbon::parse("yesterday"));
        $thisWeekLink = $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days"));
        $lastWeekLink = $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days"));
        $thisMonthLink = $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month"));
        $lastMonthLink = $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month"));
        
        return [
            "form" => $form,
            "moneyPerSection" => $result,
            "sum" => $sum,
            "todayLink" => $todayLink,
            "yesterdayLink" => $yesterdayLink,
            "thisWeekLink" => $thisWeekLink,
            "lastWeekLink" => $lastWeekLink,
            "thisMonthLink" => $thisMonthLink,
            "lastMonthLink" => $lastMonthLink,
        ];
    }


    /**
     * @Route("/all", name="gyman_reports_all")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function reportAllAction(Request $request)
    {
        $filter = new DateFilter(new DateTime("-1 month"), new DateTime("now"));
        $form = $this->createForm("reports_date_filter", $filter, [
            "method" => "GET"
        ]);

        $form->handleRequest($request);
        $filter = $form->getData();

        $startDate = Carbon::instance($filter->startDate)->setTime(0,0,0);
        $endDate = Carbon::instance($filter->endDate)->setTime(23, 59, 59);

        $queryBuilderVouchers = $this->get("gyman.vouchers.repository")->createQueryBuilder("v");

        $queryBuilderVouchers
            ->select("v.price.amount as price, v.startDate, m.id as member_id, m.details.lastname as member_lastname, m.details.firstname as member_firstname, LOWER('karnet') as type")
            ->leftJoin("v.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("v.startDate > :startDate")
            ->andWhere("v.startDate < :endDate")
            ->andWhere("v.price.amount is not null")
            ->setParameters([
                "startDate" => $startDate,
                "endDate" => $endDate
            ])
        ;

        $vouchersData = $queryBuilderVouchers->getQuery()->getArrayResult();
        $vouchersSum = array_sum(array_column($vouchersData, "price"));

        $queryBuilderEntries = $this->get("gyman.entries.repository")->createQueryBuilder("e");
        $queryBuilderEntries
            ->select("e.price.amount as price, s.title as section, e.startDate, m.id as member_id, m.details.lastname as member_lastname, m.details.firstname as member_firstname, LOWER('entry') as type")
            ->leftJoin("e.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("e.startDate > :startDate")
            ->andWhere("e.startDate < :endDate")
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

        $process = function($data = [], $result = []) {
            foreach ($data as $row) {
                $cost = floatval($row["price"]);
                $result[] = ["title" => sprintf("%s %s [%s]", $row["member_lastname"], $row["member_firstname"], $row["type"]), "sum" => $cost];
            }

            return $result;
        };

        $result = $process($entriesData, $process($vouchersData, []));

        $sum = $vouchersSum + $entriesSum;

        $router = $this->get("router");

        $getLink = function(DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_all", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "submit" => null
                ]
            ]);
        };

        $todayLink = $getLink(Carbon::parse("today")->setTime(0,0,0), Carbon::parse("today"));
        $yesterdayLink = $getLink(Carbon::parse("yesterday")->setTime(0,0,0), Carbon::parse("yesterday"));
        $thisWeekLink = $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days"));
        $lastWeekLink = $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days"));
        $thisMonthLink = $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month"));
        $lastMonthLink = $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month"));

        return [
            "form" => $form,
            "moneyPerSection" => $result,
            "sum" => $sum,
            "todayLink" => $todayLink,
            "yesterdayLink" => $yesterdayLink,
            "thisWeekLink" => $thisWeekLink,
            "lastWeekLink" => $lastWeekLink,
            "thisMonthLink" => $thisMonthLink,
            "lastMonthLink" => $lastMonthLink,
        ];
    }
}
