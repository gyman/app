<?php
namespace Gyman\Bundle\ReportsBundle\Controller;

use DateTime;
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
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm("gyman_reports_date_filter");



        $qb = $this->get("gyman.vouchers.repository")->createQueryBuilder("v");

        $qb
            ->select("SUM(v.price.amount), s.title")
            ->leftJoin("v.member", "m")
            ->leftJoin("m.sections", "s")
            ->where("v.startDate > :startDate")
            ->andWhere("v.startDate < :endDate")
            ->andWhere("v.price.amount is not null")
            ->groupBy("s.title")
            ->setParameters([
                    "startDate" => new DateTime("2016-01-01 00:00:00"),
                    "endDate" => new DateTime("2016-02-01 00:00:00")
            ]);

        $result = $qb->getQuery()->getResult();

        return [
            "moneyPerSection" => $result,
            "sum" => array_sum(array_column($result, 1))
        ];
    }
}
