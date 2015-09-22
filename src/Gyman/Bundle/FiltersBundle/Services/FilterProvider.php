<?php
namespace Gyman\Bundle\FiltersBundle\Services;

use Gyman\Bundle\FiltersBundle\Entity\Filter;
use Gyman\Bundle\FiltersBundle\Filters\FilterInterface;
use Gyman\Bundle\FiltersBundle\Traits\GetFormType;
use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class FilterProvider
{
    use ParseClassname,
        GetFormType;

    private $session;
    private $filters;
    private $filtersPerLists;
    private $container;

    /**
     * @codeCoverageIgnore
     * @param \Symfony\Component\DependencyInjection\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->setSession($container->get('session'));
    }

    /**
     * @codeCoverageIgnore
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function addFilterForList($list, FilterInterface $filter)
    {
        $className = $this->parseClassname($filter);
        $this->filtersPerLists[$list][$className] = $filter;
    }

    /**
     * @codeCoverageIgnore
     * @param  type $list
     * @return type
     */
    public function getFiltersForList($list)
    {
        return $this->filtersPerLists[$list];
    }

    /**
     * @param  type $list
     * @param  type $filterName
     * @return type
     * @todo Change name to getSubfilter/Service/
     */
    public function getFilter($filterName)
    {
        $string = preg_replace('/(?<=\\w)(?=[A-Z])/', '_$1', $filterName);
        $serviceName = sprintf('filters.%s', strtolower($string));
        $subfilter = $this->container->get($serviceName);

        return $subfilter;
    }

    /**
     * @codeCoverageIgnore
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @codeCoverageIgnore
     * @param type $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @codeCoverageIgnore
     * @param Gyman\Bundle\FiltersBundle\Entity\Filter $filter
     */
    public function setListFilter(Filter $filter)
    {
        $this->getSession()->set("filters[{$filter->getListname()}]", $filter);
    }

    /**
     * @codeCoverageIgnore
     * @param type $list
     */
    public function resetListFilter($list)
    {
        $this->getSession()->remove("filters[$list]");
    }

    /**
     * @codeCoverageIgnore
     * @return Filter
     */
    public function getListFilter($list)
    {
        return $this->getSession()->get("filters[$list]");
    }

    /**
     * Gets array of $subfiltersNames, e.g. ["Age","EntryType"]
     * and gets and them to Filter
     *
     * @param Gyman\Bundle\FiltersBundle\Entity\Filter $filter
     * @param array                                    $subfiltersNames
     */
    public function attachFilters(Filter $filter, $subfiltersNames)
    {
        foreach ($subfiltersNames as $filterName) {
            $subfilter = $this->getFilter($filterName);
            $filter->addFilter($subfilter);
        }
    }

    /**
     * @param  Request $request
     * @return Filter
     */
    public function createFilterFromRequest(Request $request)
    {
        $filter = new Filter();
        $filter->setListname($request->get('listname'));

        if ($addedFiltersNames = $request->get('add', [])) {
            $this->attachFilters($filter, $addedFiltersNames);
        }

        return $filter;
    }
}
