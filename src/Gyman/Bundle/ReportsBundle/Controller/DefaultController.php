<?php
namespace Gyman\Bundle\ReportsBundle\Controller;

use Carbon\Carbon;
use DateTime;
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
     */
    public function indexAction(Request $request)
    {
        $filter = new DateFilter();
        $form = $this->createForm("reports_date_filter", $filter);
        $result = [];

        if($request->isMethod("POST"))
        {
            $form->handleRequest($request);

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
                    "startDate" => $filter->startDate,
                    "endDate" => $filter->endDate
                ]);

            $result = $qb->getQuery()->getResult();
        }

        return [
            "form" => $form,
            "moneyPerSection" => $result,
            "sum" => array_sum(array_column($result, 1))
        ];
    }
}
