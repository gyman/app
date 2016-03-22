<?php
namespace Gyman\Application\Tests\Unit\Handler;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event;
use Dende\Calendar\Domain\Calendar\Event\Duration;
use Dende\Calendar\Domain\Calendar\Event\Occurrence;
use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Application\Handler\CreateVoucherHandler;
use Gyman\Application\Handler\OpenEntryHandler;
use Gyman\Application\Handler\UpdateMemberHandler;
use Gyman\Application\Repository\InMemoryMemberRepository;
use Gyman\Application\Repository\InMemoryVoucherRepository;
use Gyman\Domain\Entry;
use Gyman\Domain\Voucher;
use Mockery as m;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateVoucherHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    /**
     * @test
     * @throws \Exception
     */
    public function new_user_buys_voucher()
    {
        $repository = new InMemoryVoucherRepository();
        $dispatcher = m::mock(EventDispatcher::class);

        $member = MemberFactory::createFromArray([]);

        $command = new CreateVoucherCommand();
        $command->startDate = new DateTime("+1 day");
        $command->endDate = new DateTime("+30 days");
        $command->member = $member;
        $command->price = 100.00;
        $command->maximumAmount = 10;

        $handler = new CreateVoucherHandler($repository, $dispatcher);
        $handler->handle($command);

        $this->assertCount(1, $member->vouchers());
        $this->assertCount(1, $repository->findAll());
    }

    /**
     * @test
     * @throws \Exception
     *
     * Checks if vouchers decreases left entries amount if user had credit entries
     *
     */
    public function user_with_credit_entries_buys_voucher()
    {
        $repository = new InMemoryVoucherRepository();
        $dispatcher = m::mock(EventDispatcher::class);

        $member = MemberFactory::createFromArray([]);

        $occurrence = m::mock(Occurrence::class);
        $occurrence->shouldReceive("id")->andReturnUsing(function(){ return rand(0, PHP_INT_MAX); });
        $occurrence->shouldReceive("startDate")->andReturn(new DateTime());
        $occurrence->shouldReceive("event->title")->andReturn("");

        $creditEntry1 = EntryFactory::createFromArray([
            'startDate'            => new DateTime("-10 days -2 hours"),
            'endDate'              => new DateTime("-10 days"),
            'price'                => ['amount' => 0, 'currency' => 'PLN'],
            'type'                 => Entry::TYPE_CREDIT,
            'occurrence'           => $occurrence,
            'member'               => $member,
        ]);

        $paidEntry1 = EntryFactory::createFromArray([
            'startDate'            => new DateTime("-10 days -2 hours"),
            'endDate'              => new DateTime("-10 days"),
            'price'                => ['amount' => 20.00, 'currency' => 'PLN'],
            'type'                 => Entry::TYPE_PAID,
            'occurrence'           => $occurrence,
            'member'               => $member,
        ]);

        $freeEntry1 = EntryFactory::createFromArray([
            'startDate'            => new DateTime("-10 days -2 hours"),
            'endDate'              => new DateTime("-10 days"),
            'price'                => ['amount' => 0, 'currency' => 'PLN'],
            'type'                 => Entry::TYPE_FREE,
            'occurrence'           => $occurrence,
            'member'               => $member,
        ]);

        $creditEntry2 = clone($creditEntry1);
        $creditEntry3 = clone($creditEntry1);

        $member->enter($creditEntry1);
        $member->enter($creditEntry2);
        $member->enter($creditEntry3);
        $member->enter($paidEntry1);
        $member->enter($freeEntry1);

        $command = new CreateVoucherCommand();
        $command->startDate = new DateTime("-1 day");
        $command->endDate = new DateTime("+30 days");
        $command->member = $member;
        $command->price = 100.00;
        $command->maximumAmount = 10;

        $handler = new CreateVoucherHandler($repository, $dispatcher);
        $handler->handle($command);

        $this->assertCount(1, $member->vouchers());
        $this->assertCount(5, $member->entries());
        $this->assertCount(1, $repository->findAll());
        $this->assertInstanceOf(Voucher::class, $member->currentVoucher());
        $this->assertEquals(7, $member->currentVoucher()->leftEntriesAmount());
    }
}
