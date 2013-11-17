<?php

namespace Gyman\Bundle\ListsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/entries")
 */
class EntriesController extends Controller implements ListControllerInterface
{
    private $listname = "entries";

    public function getListname()
    {
        return $this->listname;
    }

    /**
     * @Route("/", name="_list_entries")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $filter = $this->get("filter_provider")->getListFilter($this->getListname());
        $filters = $this->get("filter_repository")->getFiltersByListname($this->getListname());

        return array(
            "filter"   => $filter,
            "filters"  => $filters,
            "listname" => $this->getListname()
        );
    }

    /**
     * @Route("/datasource.{_format}", name="_list_entries_datasource", defaults={"_format" = "json"}, requirements={"_format" = "json"})
     * @Template()
     */
    public function datasourceAction(Request $request)
    {
        $membersList = $this->get("entries_list");
        $data = $membersList->getResults();

        return new JsonResponse($data);
    }
}
