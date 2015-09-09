<?php
namespace Gyman\Component\Vouchers\Tests\Unit\Model;

use Gyman\Component\Vouchers\Factory\VoucherFactory;
use Gyman\Component\Vouchers\Model\Voucher;

class VoucherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Gyman\Component\Vouchers\Exception\VoucherClosingDateBeforeOpeningException
     */
    public function testConstructor()
    {
        VoucherFactory::createFromArray([
            'startDate' => '2015-6-15 00:00:00',
            'endDate'   => '2015-6-1 23:59:59',
        ]);
    }

    /**
     * @dataProvider overlapsDataProvider
     */
    public function testOverlaps(Voucher $testVoucher, $overlaps)
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => '2015-6-1 00:00:00',
            'endDate'   => '2015-6-15 23:59:59',
        ]);

        $this->assertEquals($voucher->overlaps($testVoucher), $overlaps);
        $this->assertEquals($testVoucher->overlaps($voucher), $overlaps);
    }

    /**
     * @return array
     */
    public function overlapsDataProvider()
    {
        return [
            'before' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => '2015-5-15 00:00:00',
                    'endDate'   => '2015-5-31 23:59:59',
                ]),
                'overlaps' => false,
            ],
            'overlaps from left' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => '2015-5-25 00:00:00',
                    'endDate'   => '2015-6-2 23:59:59',
                ]),
                'overlaps' => true,
            ],
            'overlaps fully' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => '2015-6-5 00:00:00',
                    'endDate'   => '2015-6-10 23:59:59',
                ]),
                'overlaps' => true,
            ],
            'overlaps from right' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => '2015-6-10 00:00:00',
                    'endDate'   => '2015-6-20 23:59:59',
                ]),
                'overlaps' => true,
            ],
            'after' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => '2015-6-16 00:00:00',
                    'endDate'   => '2015-6-31 23:59:59',
                ]),
                'overlaps' => false,
            ],
        ];
    }
}
