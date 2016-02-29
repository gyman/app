<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filters
 *
 * @ORM\Table(name="filters")
 * @ORM\Entity
 */
class Filters
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="filter", type="string", length=4096, nullable=false)
     */
    private $filter;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pinned", type="boolean", nullable=true)
     */
    private $pinned;

    /**
     * @var string
     *
     * @ORM\Column(name="listname", type="string", nullable=true)
     */
    private $listname;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

