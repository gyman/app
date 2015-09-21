<?php

namespace Gyman\Bundle\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spy\TimelineBundle\Entity\ActionComponent as BaseActionComponent;

/**
 * @ORM\Entity
 * @ORM\Table(name="timeline_action_component")
 */
class ActionComponent extends BaseActionComponent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\TimelineBundle\Entity\Action", inversedBy="actionComponents")
     * @ORM\JoinColumn(name="action_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $action;

    /**
     * @ORM\ManyToOne(targetEntity="Gyman\Bundle\TimelineBundle\Entity\Component")
     * @ORM\JoinColumn(name="component_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $component;
}
