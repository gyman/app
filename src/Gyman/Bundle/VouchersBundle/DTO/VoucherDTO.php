<?php
namespace Gyman\Bundle\VouchersBundle\DTO;

use Gyman\Domain\Model\Member;

/**
 * Class VoucherDTO
 * @package Gyman\Bundle\VouchersBundle
 */
class VoucherDTO
{
    /**
     * @var \DateTime
     */
    public $startDate;

    /**
     * @var \DateTime
     */
    public $endDate;

    /**
     * @var integer
     */
    public $maximumAmount;

    /**
     * @var integer
     */
    public $price;

    /**
     * @var Member
     */
    public $member;
}
