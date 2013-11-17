<?php

namespace Gyman\Bundle\FiltersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\FiltersBundle\Filters\FilterInterface;
use Doctrine\ORM\QueryBuilder;
use Gyman\Bundle\FiltersBundle\Traits\ParseClassname;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Filter
 *
 * @ORM\Table("filters")
 * @ORM\Entity(repositoryClass="Gyman\Bundle\FiltersBundle\Entity\FilterRepository")
 * @codeCoverageIgnore
 * @Assert\Callback(
 *      methods={"isFilterEmptyConstraint"},
 *      groups={"setFilter","saveFilter"}
 * )
 */
class Filter
{
    use ParseClassname;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(message = "Pole nie może być puste!", groups={"saveFilter"})
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var ArrayCollection
     * @ORM\Column(name="filters", type="object", nullable=false)
     */
    private $filters;

    /**
     * @var string
     *
     * @ORM\Column(name="pinned", type="boolean", nullable=true)
     */
    private $pinned;

    /**
     * @var string $listname
     *
     * @ORM\Column(name="listname", type="string", columnDefinition="enum('members', 'vouchers', 'entries')", nullable=false)
     * @Assert\NotBlank(message = "Pole nie może być puste!", groups={"saveFilter","setFilter"})
     */
    private $listname;

    public function getListname()
    {
        return $this->listname;
    }

    public function setListname($listname)
    {
        $this->listname = $listname;
    }

    public function __construct()
    {
        $this->filters = new ArrayCollection();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFilters()
    {
        return $this->filters;
    }

    public function getPinned()
    {
        return $this->pinned;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFilters($filter)
    {
        $this->filters = $filter;
    }

    public function setPinned($pinned)
    {
        $this->pinned = $pinned;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function addFilter(FilterInterface $filter)
    {
        $key = $this->parseClassname($filter);
        $this->filters->set($key, $filter);
    }

    public function apply(QueryBuilder $query)
    {
        if (count($this->filters) > 0) {
            foreach ($this->filters as $filter) {
                $filter->apply($query);
            }
        }
    }

    public function isFilterEmptyConstraint(ExecutionContextInterface $context)
    {
        if (count($this->filters) == 0) {
            $context->addViolationAt(
                'filters', 'Musisz dodać jakieś opcje!', array(), null
            );
        }
    }
}
