<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vouchers
 *
 * @ORM\Table(name="vouchers", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9315074897AE0266", columns={"barcode"})}, indexes={@ORM\Index(name="IDX_931507487597D3FE", columns={"member_id"})})
 * @ORM\Entity
 */
class Vouchers
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime", nullable=true)
     */
    private $startdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime", nullable=true)
     */
    private $enddate;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_left", type="integer", nullable=true)
     */
    private $amountLeft;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=32, nullable=true)
     */
    private $barcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedat;

    /**
     * @var integer
     *
     * @ORM\Column(name="member_id", type="integer", nullable=true)
     */
    private $memberId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Gyman\Bundle\OldRioBundle\Entity\Members
     *
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Members")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="member_id", referencedColumnName="id")
     * })
     */
    private $member;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Activities", inversedBy="voucher")
     * @ORM\JoinTable(name="vouchers_activities",
     *   joinColumns={
     *     @ORM\JoinColumn(name="voucher_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     *   }
     * )
     */
    private $activity;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activity = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

