<?php
namespace Gyman\Bundle\ReportsBundle\Controller;

use Carbon\Carbon;
use DateTime;
use Gyman\Domain\Entry;
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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render("@GymanReports/Default/index.html.twig");
    }

    /**
     * @Route("/per-section", name="gyman_reports_per_section")
     * @Template("@GymanReports/Default/perSection.html.twig")
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

        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
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

        $process = function ($data = [], $result = []) {
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
        
        $getLink = function (DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_per_section", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "submit" => null
                ]
            ]);
        };

        $todayLink = $getLink(Carbon::parse("today"), Carbon::parse("today"));
        $yesterdayLink = $getLink(Carbon::parse("yesterday"), Carbon::parse("yesterday"));
        $thisWeekLink = $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days"));
        $lastWeekLink = $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days"));
        $thisMonthLink = $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month"));
        $lastMonthLink = $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month"));
        
        return [
            "form" => $form->createView(),
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
     * @Route("/per-section", name="gyman_reports_per_member")
     * @Template("@GymanReports/Default/perMember.html.twig")
     * @param Request $request
     * @return array
     */
    public function perMemberAction(Request $request)
    {
        $filter = new DateFilter(new DateTime("-1 month"), new DateTime("now"));
        $form = $this->createForm("reports_date_filter", $filter, [
            "method" => "GET"
        ]);

        $form->handleRequest($request);
        $filter = $form->getData();

        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
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

        $process = function ($data = [], $result = []) {
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

        $getLink = function (DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_per_section", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "submit" => null
                ]
            ]);
        };

        $todayLink = $getLink(Carbon::parse("today"), Carbon::parse("today"));
        $yesterdayLink = $getLink(Carbon::parse("yesterday"), Carbon::parse("yesterday"));
        $thisWeekLink = $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days"));
        $lastWeekLink = $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days"));
        $thisMonthLink = $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month"));
        $lastMonthLink = $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month"));

        return [
            "form" => $form->createView(),
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
     * @Template("GymanReportsBundle:Default:reportAll.html.twig")
     * @param Request $request
     * @return array
     */
    public function reportAllAction(Request $request)
    {
        $filter = new DateFilter(new DateTime("-1 month"), new DateTime("now"));
        $form = $this->createForm("reports_date_member_filter", $filter, [
            "method" => "GET"
        ]);

        $form->handleRequest($request);
        $filter = $form->getData();

        $startDate = Carbon::instance($filter->startDate)->setTime(0, 0, 0);
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

        $process = function ($data = [], $result = []) {
            foreach ($data as $row) {
                $cost = floatval($row["price"]);
                $result[] = ["title" => sprintf("%s %s [%s]", $row["member_lastname"], $row["member_firstname"], $row["type"]), "sum" => $cost];
            }

            return $result;
        };

        $result = $process($entriesData, $process($vouchersData, []));

        $sum = $vouchersSum + $entriesSum;

        $router = $this->get("router");

        $getLink = function (DateTime $startDate, DateTime $endDate) use ($form, $router) {
            return $router->generate("gyman_reports_all", [
                $form->getName() => [
                    "startDate" => $startDate->format("d.m.Y"),
                    "endDate" => $endDate->format("d.m.Y"),
                    "submit" => null
                ]
            ]);
        };

        $todayLink = $getLink(Carbon::parse("today"), Carbon::parse("today"));
        $yesterdayLink = $getLink(Carbon::parse("yesterday"), Carbon::parse("yesterday"));
        $thisWeekLink = $getLink(Carbon::parse("this week"), Carbon::parse("this week +6 days"));
        $lastWeekLink = $getLink(Carbon::parse("previous week"), Carbon::parse("previous week +6 days"));
        $thisMonthLink = $getLink(Carbon::parse("first day of this month"), Carbon::parse("last day of this month"));
        $lastMonthLink = $getLink(Carbon::parse("first day of last month"), Carbon::parse("last day of last month"));

        return [
            "form" => $form->createView(),
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
