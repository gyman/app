<?php
namespace Gyman\Bundle\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spy\TimelineBundle\Entity\Timeline as BaseTimeline;

/**
 * @ORM\Table("timelines")
 * @ORM\Entity()
 * @codeCoverageIgnore
 */
class Timeline extends BaseTimeline
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\TimelineBundle\Entity\Action", inversedBy="timelines")
     * @ORM\JoinColumn(name="action_id", referencedColumnName="id")
     */
    protected $action;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\TimelineBundle\Entity\Component")
     * @ORM\JoinColumn(name="subject_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $subject;
}
