<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entries
 *
 * @ORM\Table(name="entries", indexes={@ORM\Index(name="IDX_2DF8B3C57597D3FE", columns={"member_id"}), @ORM\Index(name="IDX_2DF8B3C581C06096", columns={"activity_id"}), @ORM\Index(name="IDX_2DF8B3C528AA1B6F", columns={"voucher_id"})})
 * @ORM\Entity
 */
class Entries
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_type", type="string", nullable=true)
     */
    private $entryType;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false)
     */
    private $modified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="entry_price", type="string", length=255, nullable=true)
     */
    private $entryPrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Gyman\Bundle\OldRioBundle\Entity\Activities
     *
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Activities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="activity_id", referencedColumnName="id")
     * })
     */
    private $activity;

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
     * @var \Gyman\Bundle\OldRioBundle\Entity\Vouchers
     *
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Vouchers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="voucher_id", referencedColumnName="id")
     * })
     */
    private $voucher;


}

