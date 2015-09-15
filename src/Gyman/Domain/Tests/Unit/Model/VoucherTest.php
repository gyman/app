<?php
namespace Gyman\Domain\Tests\Unit\Model;

use DateTime;
use Gyman\Domain\Factory\VoucherFactory;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Voucher;

class VoucherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Gyman\Domain\Exception\VoucherClosingDateBeforeOpeningException
     */
    public function testConstructorExceptionEndDateBeforeStartDate()
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

    public function testLeftDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => '-10 days',
            'endDate'   => '+15 days',
        ]);

        $this->assertEquals($voucher->leftDaysAmount(), 15);
        $this->assertEquals($voucher->leftDaysAmount('now'), 15);
        $this->assertEquals($voucher->leftDaysAmount('-1 year'), 380);
        $this->assertEquals($voucher->leftDaysAmount('+15 days'), 0);
    }

    public function testTotalDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => '-10 days',
            'endDate'   => '+15 days',
        ]);

        $this->assertEquals($voucher->totalDaysAmount(), 25);
    }

    public function testPassedDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => '-10 days',
            'endDate'   => '+15 days',
        ]);

        $this->assertEquals($voucher->passedDaysAmount(), 10);
        $this->assertEquals($voucher->passedDaysAmount('now'), 10);
        $this->assertEquals($voucher->passedDaysAmount('+15 days'), 25);
    }

    public function testLeftEntriesAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate'     => '-10 days',
            'endDate'       => '+15 days',
            'maximumAmount' => '10',
        ]);

        $this->assertEquals($voucher->leftEntriesAmount(), 10);

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER)
        );

        $this->assertEquals($voucher->leftEntriesAmount(), 9);

        $voucher->entries()->last()->closeEntry(new DateTime());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER)
        );

        $this->assertEquals($voucher->leftEntriesAmount(), 8);
    }

    /**
     * @throws \Gyman\Domain\Exception\EntryMustBeVoucherTypeException
     * @throws \Gyman\Domain\Exception\ExceededMaximumAmountOfEntriesException
     * @throws \Gyman\Domain\Exception\LastEntryIsStillOpenedException
     * @expectedException \Gyman\Domain\Exception\ExceededMaximumAmountOfEntriesException
     */
    public function testNoLeftEntriesAmountException()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate'     => '-10 days',
            'endDate'       => '+15 days',
            'maximumAmount' => '1',
        ]);

        $this->assertEquals($voucher->leftEntriesAmount(), 1);

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER)
        );

        $this->assertEquals($voucher->leftEntriesAmount(), 0);

        $voucher->entries()->last()->closeEntry(new DateTime());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER)
        );
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
