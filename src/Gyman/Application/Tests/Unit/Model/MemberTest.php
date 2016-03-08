<?php
namespace Gyman\Application\Tests\Unit\Entity;

use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Factory\VoucherFactory;

class MemberTest extends \PHPUnit_Framework_TestCase
{
    public function testUpdateCurrentVoucher()
    {
        $member = MemberFactory::create();

        $voucher1 = VoucherFactory::createFromArray([
            'startDate' => '-3 hour',
            'endDate'   => '-2hour',
        ]);
        $voucher2 = VoucherFactory::createFromArray([
            'startDate' => '-1 hour',
            'endDate'   => '+1 hour',
        ]);
        $voucher3 = VoucherFactory::createFromArray([
            'startDate' => '+2 hour',
            'endDate'   => '+3 hour',
        ]);

        $member->addVoucher($voucher1);
        $this->assertFalse($member->hasCurrentVoucher());

        $member->addVoucher($voucher2);
        $this->assertTrue($member->hasCurrentVoucher());

        $member->addVoucher($voucher3);
        $this->assertTrue($member->hasCurrentVoucher());

        $this->assertSame($voucher2, $member->currentVoucher());
    }
}
