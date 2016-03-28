<?php
namespace Gyman\Application\Tests\Unit\Model;

use Carbon\Carbon;
use DateTime;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Application\Factory\VoucherFactory;
use Gyman\Domain\Entry;
use Gyman\Domain\Voucher;
use Gyman\Domain\Voucher\Price;
use Gyman\Domain\Entry\Price as EntryPrice;

class VoucherTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Gyman\Application\Exception\VoucherClosingDateBeforeOpeningException
     */
    public function testConstructorExceptionEndDateBeforeStartDate()
    {
        VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('2015-6-15 00:00:00'),
            'endDate'   => Carbon::parse('2015-6-1 23:59:59'),
        ]);
    }

    /**
     * @dataProvider overlapsDataProvider
     */
    public function testOverlaps(Voucher $testVoucher, $overlaps)
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('2015-6-1 00:00:00'),
            'endDate'   => Carbon::parse('2015-6-15 23:59:59'),
            'maximumAmount' => 2
        ]);

        $this->assertEquals($voucher->overlaps($testVoucher), $overlaps);
        $this->assertEquals($testVoucher->overlaps($voucher), $overlaps);
    }

    public function testLeftDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('-10 days'),
            'endDate'   => Carbon::parse('+15 days'),
        ]);

        $this->assertEquals(15, $voucher->leftDaysAmount());
        $this->assertEquals(15, $voucher->leftDaysAmount('now'));
        $this->assertEquals(380, $voucher->leftDaysAmount('-1 year'));
        $this->assertEquals(0, $voucher->leftDaysAmount('+15 days'));
    }

    public function testTotalDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('-10 days'),
            'endDate'   => Carbon::parse('+15 days'),
        ]);

        $this->assertEquals($voucher->totalDaysAmount(), 25);
    }

    public function testPassedDaysAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate' => Carbon::parse('-10 days'),
            'endDate'   => Carbon::parse('+15 days'),
        ]);

        $this->assertEquals($voucher->passedDaysAmount(), 10);
        $this->assertEquals($voucher->passedDaysAmount('now'), 10);
        $this->assertEquals($voucher->passedDaysAmount('+15 days'), 25);
    }

    public function testLeftEntriesAmount()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate'     => Carbon::parse('-10 days'),
            'endDate'       => Carbon::parse('+15 days'),
            'maximumAmount' => '10',
        ]);

        $this->assertEquals(10, $voucher->leftEntriesAmount());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER, null, EntryPrice::zero())
        );

        $this->assertEquals(9, $voucher->leftEntriesAmount());

        $voucher->entries()->last()->closeEntry(new DateTime());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER, null, EntryPrice::zero())
        );

        $this->assertEquals(8, $voucher->leftEntriesAmount());
    }

    /**
     * @throws \Gyman\Application\Exception\EntryMustBeVoucherTypeException
     * @throws \Gyman\Application\Exception\ExceededMaximumAmountOfEntriesException
     * @throws \Gyman\Application\Exception\LastEntryIsStillOpenedException
     * @expectedException \Gyman\Application\Exception\ExceededMaximumAmountOfEntriesException
     */
    public function testNoLeftEntriesAmountException()
    {
        $voucher = VoucherFactory::createFromArray([
            'startDate'     => Carbon::parse('-10 days'),
            'endDate'       => Carbon::parse('+15 days'),
            'maximumAmount' => '1',
        ]);

        $this->assertEquals(1, $voucher->leftEntriesAmount());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER, null, EntryPrice::zero())
        );

        $this->assertEquals(0, $voucher->leftEntriesAmount());

        $voucher->entries()->last()->closeEntry(new DateTime());

        $voucher->addEntry(
            new Entry(new DateTime('now'), Entry::TYPE_VOUCHER, null, EntryPrice::zero())
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
                    'startDate' => Carbon::parse('2015-5-15 00:00:00'),
                    'endDate'   => Carbon::parse('2015-5-31 23:59:59'),
                ]),
                'overlaps' => false,
            ],
            'overlaps from left' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => Carbon::parse('2015-5-25 00:00:00'),
                    'endDate'   => Carbon::parse('2015-6-2 23:59:59'),
                ]),
                'overlaps' => true,
            ],
            'overlaps fully' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => Carbon::parse('2015-6-5 00:00:00'),
                    'endDate'   => Carbon::parse('2015-6-10 23:59:59'),
                ]),
                'overlaps' => true,
            ],
            'overlaps from right' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => Carbon::parse('2015-6-10 00:00:00'),
                    'endDate'   => Carbon::parse('2015-6-20 23:59:59'),
                ]),
                'overlaps' => true,
            ],
            'after' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => Carbon::parse('2015-6-16 00:00:00'),
                    'endDate'   => Carbon::parse('2015-6-31 23:59:59'),
                ]),
                'overlaps' => false,
            ],
            'overlaps fully but no left entries' => [
                'testVoucher' => VoucherFactory::createFromArray([
                    'startDate' => Carbon::parse('2015-6-5 00:00:00'),
                    'endDate'   => Carbon::parse('2015-6-10 23:59:59'),
                    'maximumAmount' => 2,
                    'entries' => [
                        EntryFactory::createFromArray([
                            "type" => Entry::TYPE_VOUCHER,
                        ]),
                        EntryFactory::createFromArray([
                            "type" => Entry::TYPE_VOUCHER,
                        ]),
                    ]
                ]),
                'overlaps' => false,
            ],
        ];
    }
}
