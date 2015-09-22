<?php

namespace Gyman\Bundle\ListsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/entries")
 * @Security("has_role('ROLE_ADMIN')")
 */
class EntriesController extends Controller implements ListControllerInterface
{
    private $listname = 'entries';

    public function getListname()
    {
        return $this->listname;
    }

    /**
     * @Route("/", name="_list_entries")
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
     * @Route("/datasource.{_format}", name="_list_entries_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Security("has_role('ROLE_ADMIN')")
     * @Template()
     */
    public function datasourceAction(Request $request)
    {
        $membersList = $this->get('entries_list');
        $data = $membersList->getResults();

        return new JsonResponse($data);
    }
}
