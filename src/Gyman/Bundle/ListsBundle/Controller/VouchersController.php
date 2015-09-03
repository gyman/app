<?php
namespace Gyman\Bundle\ListsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/vouchers")
 * @Security("has_role('ROLE_ADMIN')")
 */
class VouchersController extends Controller implements ListControllerInterface
{
    private $listname = 'vouchers';

    public function getListname()
    {
        return $this->listname;
    }

    /**
     * @Route("/", name="_vouchers_list")
     * @Security("has_role('ROLE_ADMIN')")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filter = $this->get('filter_provider')->getListFilter($this->getListname());
        $filters = $this->get('filter_repository')->getFiltersByListname($this->getListname());

        return [
            'filter'   => $filter,
            'filters'  => $filters,
            'listname' => $this->getListname(),
        ];
    }

    /**
     * @Route("/datasource.{_format}", name="_list_vouchers_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Security("has_role('ROLE_ADMIN')")
     * @Template()
     */
    public function datasourceAction(Request $request)
    {
        $vouchersList = $this->get('vouchers_list');
        $data = $vouchersList->getResults();

        return new JsonResponse($data);
    }
}
