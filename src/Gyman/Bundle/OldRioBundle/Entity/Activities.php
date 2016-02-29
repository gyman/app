<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activities
 *
 * @ORM\Table(name="activities")
 * @ORM\Entity
 */
class Activities
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Vouchers", mappedBy="activity")
     */
    private $voucher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->voucher = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

