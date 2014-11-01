<?php

namespace Gyman\Bundle\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spy\TimelineBundle\Entity\Action as BaseAction;

/**
 * @ORM\Table("timeline_actions")
 * @ORM\Entity()
 * @codeCoverageIgnore
 */

class Action extends BaseAction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Gyman\Bundle\TimelineBundle\Entity\ActionComponent", mappedBy="action", cascade={"persist"})
     */
    protected $actionComponents;

    /**
     * @ORM\OneToMany(targetEntity="Gyman\Bundle\TimelineBundle\Entity\Timeline", mappedBy="action")
     */
    protected $timelines;
}
