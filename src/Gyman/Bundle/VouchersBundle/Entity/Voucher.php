<?php
namespace Gyman\Bundle\VouchersBundle\Entity;

use DateTime;
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
