<?php
namespace Gyman\Bundle\VouchersBundle\Entity;

use DateTime;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Vouchers\Model\Price;
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

    /**
     * @return Member
     */
    public function member()
    {
        return $this->member;
    }

    /**
     * @param Member $member
     */
    public function setMember(Member $member)
    {
        $this->member = $member;
    }

    /**
     * @return DateTime
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * Voucher constructor.
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param Price $price
     * @param int $maximumAmount
     * @param Member $member
     */
    public function __construct(\DateTime $startDate, \DateTime $endDate, Price $price, $maximumAmount = 0, $entries = [], $member = null)
    {
        parent::__construct($startDate, $endDate, $price, $maximumAmount, $entries);
        $this->member = $member;
    }
}
