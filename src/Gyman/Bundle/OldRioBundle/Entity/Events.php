<?php

namespace Gyman\Bundle\OldRioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="IDX_5387574A81C06096", columns={"activity_id"})})
 * @ORM\Entity
 */
class Events
{
    /**
     * @var string
     *
     * @ORM\Column(name="day_of_week", type="string", nullable=true)
     */
    private $dayOfWeek;

    /**
     * @var string
     *
     * @ORM\Column(name="start_hour", type="string", length=255, nullable=false)
     */
    private $startHour;

    /**
     * @var string
     *
     * @ORM\Column(name="end_hour", type="string", length=255, nullable=false)
     */
    private $endHour;

    /**
     * @var integer
     *
     * @ORM\Column(name="hidden", type="integer", nullable=true)
     */
    private $hidden;

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


}

