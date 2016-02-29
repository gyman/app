<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Members
 *
 * @ORM\Table(name="members", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_45A0D2FFF711D21D", columns={"current_voucher_id"}), @ORM\UniqueConstraint(name="UNIQ_45A0D2FF97AE0266", columns={"barcode"}), @ORM\UniqueConstraint(name="UNIQ_45A0D2FFC2570CDC", columns={"last_entry_id"})})
 * @ORM\Entity
 */
class Members
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
     * @ORM\Column(name="birthdate", type="string", length=64, nullable=true)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=64, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deletedAt", type="datetime", nullable=true)
     */
    private $deletedat;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255, nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="belt", type="string", nullable=true)
     */
    private $belt;

    /**
     * @var string
     *
     * @ORM\Column(name="name_slug", type="string", length=255, nullable=false)
     */
    private $nameSlug;

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
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=64, nullable=true)
     */
    private $barcode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_starred", type="boolean", nullable=true)
     */
    private $isStarred;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Gyman\Bundle\OldRioBundle\Entity\Vouchers
     *
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Vouchers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="current_voucher_id", referencedColumnName="id")
     * })
     */
    private $currentVoucher;

    /**
     * @var \Gyman\Bundle\OldRioBundle\Entity\Entries
     *
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\OldRioBundle\Entity\Entries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="last_entry_id", referencedColumnName="id")
     * })
     */
    private $lastEntry;


}

