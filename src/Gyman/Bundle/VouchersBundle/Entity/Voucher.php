<?php
namespace Gyman\Bundle\VouchersBundle\Entity;

use DateTime;

use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Vouchers\Model\Voucher as BaseVoucher;

/**
 * Voucher
 */
class Voucher extends BaseVoucher
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
     * @var DateTime $created
     */
    protected $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    protected $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $deletedAt;
}
