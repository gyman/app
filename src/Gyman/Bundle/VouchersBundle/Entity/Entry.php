<?php
namespace Gyman\Bundle\VouchersBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\ScheduleBundle\Entity\Occurence;
use Gyman\Component\Vouchers\Model\Entry as BaseEntry;

class Entry extends BaseEntry
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var DateTime $created
     */
    protected $createdAt;

    /**
     * @var DateTime $modified
     */
    protected $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $deletedAt;

}
