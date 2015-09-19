<?php
namespace Gyman\Bundle\AppBundle\Entity;

use DateTime;
use Gyman\Domain\Model\Entry as BaseEntry;

class Entry extends BaseEntry
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Member
     */
    protected $member;

    /**
     * @var Member
     */
    protected $currentForMember;

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
