<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Unit\Entity;

use Carbon\Carbon;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Factory\VoucherFactory;

/**
 * @coversNothing
 */
class MemberTest extends \PHPUnit_Framework_TestCase
{
    public function testUpdateCurrentVoucher()
    {
        $member = MemberFactory::create();

        $voucher1 = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('-3 hour'),
            'endDate'   => Carbon::parse('-2hour'),
        ]);
        $voucher2 = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('-1 hour'),
            'endDate'   => Carbon::parse('+1 hour'),
        ]);
        $voucher3 = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('+2 hour'),
            'endDate'   => Carbon::parse('+3 hour'),
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
