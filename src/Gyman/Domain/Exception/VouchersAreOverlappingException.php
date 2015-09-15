<?php

/**
 * Created by PhpStorm.
 * User: uirapuru
 * Date: 09.09.15
 * Time: 22:22
 */
namespace Gyman\Domain\Exception;

use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\Voucher;

class VouchersAreOverlappingException extends \Exception
{
    /**
     * @var Member
     */
    private $member;

    /**
     * @var Voucher
     */
    private $existingVoucher;

    /**
     * @var Voucher
     */
    private $newVoucher;

    /**
     * VouchersAreOverlappingException constructor.
     */
    public function __construct(Member $member, Voucher $existing, Voucher $new)
    {
        $this->message = sprintf(
            'Trying to add voucher [%s to %s] for user %d/%s where he has already voucher [%s to %s]',
            $existing->startDate()->format('Y-m-d H:i:s'),
            $existing->endDate()->format('Y-m-d H:i:s'),
            $member->id(),
            $member->email()->email(),
            $new->startDate()->format('Y-m-d H:i:s'),
            $new->endDate()->format('Y-m-d H:i:s')
        );

        $this->member = $member;
        $this->existingVoucher = $existing;
        $this->newVoucher = $new;
    }

    /**
     * @return Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @return Voucher
     */
    public function getExistingVoucher()
    {
        return $this->existingVoucher;
    }

    /**
     * @return Voucher
     */
    public function getNewVoucher()
    {
        return $this->newVoucher;
    }
}
