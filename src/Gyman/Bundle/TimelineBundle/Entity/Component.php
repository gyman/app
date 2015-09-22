<?php
namespace Gyman\Bundle\TimelineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Spy\TimelineBundle\Entity\Component as BaseComponent;

/**
 * @ORM\Entity
 * @ORM\Table(name="timeline_component")
 */
class Component extends BaseComponent
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
