<?php
namespace Gyman\Bundle\VouchersBundle\Entity;

use DateTime;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Vouchers\Model\Entry as BaseEntry;

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
