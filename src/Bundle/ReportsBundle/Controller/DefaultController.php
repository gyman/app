<?php

declare(strict_types=1);

namespace Gyman\Bundle\ReportsBundle\Controller;

use DateTime;
use Gyman\Bundle\ReportsBundle\Form\DateFilter;
use Gyman\Bundle\ReportsBundle\Form\Type\DateFilterType;
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
     * @Template("GymanReportsBundle:Default:index.html.twig")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createForm(DateFilterType::class, new DateFilter(new DateTime('-1 month'), new DateTime('now'), 'all'), [
                'method' => 'GET',
        ]);

        $form->handleRequest($request);
        $filter = $form->getData();

        $reportGenerator = $this->get('gyman.reports.generator');

        $result = $reportGenerator->result($filter);

        return [
            'form'  => $form->createView(),
            'rows'  => $result['rows'],
            'sum'   => $result['sum'],
            'links' => $reportGenerator->links($form),
        ];
    }
}
