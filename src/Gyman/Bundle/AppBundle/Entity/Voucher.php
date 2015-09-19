<?php
namespace Gyman\Bundle\AppBundle\Entity;

use DateTime;
use Gyman\Domain\Model\Voucher as BaseVoucher;

/**
 * Voucher
 */
class Voucher extends BaseVoucher
{
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
     * @return DateTime
     */
    public function createdAt()
    {
        return $this->createdAt;
    }
}
