<?php

namespace Gyman\Component\Vouchers\Service;

use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Model\Voucher;

/**
 * Class SellVoucher
 * @package Gyman\Component\Vouchers
 */
class SellVoucher
{
    const SUCCESS = 'gyman.voucher_sell.success';
    const FAILURE = 'gyman.voucher_sell.failure';

    /**
     * @param Member $member
     * @param Voucher $voucher
     * @param UserInterface $author
     */
    public function sellVoucher(Member $member, Voucher $voucher, UserInterface $author)
    {
    }
}
