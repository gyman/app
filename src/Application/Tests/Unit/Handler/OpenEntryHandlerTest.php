<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Unit\Handler;

use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Application\Event\EntryEvent;
use Gyman\Application\Handler\OpenEntryHandler;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Mockery as m;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * @coversNothing
 */
class OpenEntryHandlerTest extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    /**
     * user has current voucher with free entries.
     *
     * @test
     */
    public function testHandle()
    {
        $factoryMock = m::mock('alias:Gyman\Application\Factory\EntryFactory');
        /** @var Entry $entryMock */
        $entryMock = m::mock(Entry::class);

        /** @var MemberRepositoryInterface $memberRepository */
        $memberRepository = m::mock(MemberRepository::class);

        $eventMock = new EntryEvent($entryMock);

        /** @var EventDispatcherInterface|m\MockInterface $dispatcherMock */
        $dispatcherMock = m::mock(EventDispatcher::class);
        $dispatcherMock->shouldReceive('dispatch')->times(1)->with(OpenEntryHandler::SUCCESS, $eventMock)->andReturnNull();

        $handler = new OpenEntryHandler($memberRepository, $dispatcherMock);

        $currentVoucherMock = m::mock(Voucher::class);
        $currentVoucherMock->shouldReceive('leftEntriesAmount')->times(1)->andReturn(5);

        $memberMock = m::mock(Member::class);
        $memberMock->shouldReceive('hasCurrentVoucher')->times(1)->andReturnTrue();
        $memberMock->shouldReceive('currentVoucher')->times(1)->andReturn($currentVoucherMock);
        $memberMock->shouldReceive('enter')->times(1)->with($entryMock)->andReturnNull();

        $memberRepository->shouldReceive('save')->times(1)->with($memberMock)->andReturnTrue();

        $command = new OpenEntryCommand($memberMock);

        $factoryMock->shouldReceive('createFromOpenEntryCommand')->times(1)->with($command)->andReturn($entryMock);

        $handler->handle($command);
    }
}
