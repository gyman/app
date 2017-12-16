<?php
namespace Gyman\Application\Tests\Unit\Handler;

use Gyman\Application\Command\ClearExpiredCurrentVouchersCommand;
use Gyman\Application\Command\CloseExpiredEntriesCommand;
use Gyman\Application\Handler\ClearExpiredCurrentVouchersHandler;
use Gyman\Application\Handler\CloseExpiredEntriesHandler;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Mockery as m;
use Symfony\Component\EventDispatcher\EventDispatcher;

class CloseExpiredEntriesHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown(){
        parent::tearDown();
        m::close();
    }

    public function testHandle() {
        $memberMock1 = m::mock(Member::class);
        $memberMock1->shouldReceive("exitLastEntry")->times(1);

        $memberMock2 = m::mock(Member::class);
        $memberMock2->shouldReceive("exitLastEntry")->times(1);

        $memberMock3 = m::mock(Member::class);
        $memberMock3->shouldReceive("exitLastEntry")->times(1);

        $members = [
            $memberMock1,
            $memberMock2,
            $memberMock3
        ];

        $dispatcher = m::mock(EventDispatcher::class);
        $repository = m::mock(MemberRepository::class);
        $repository->shouldReceive('findAllByExpiredLastEntry')->once()->withNoArgs()->andReturn($members);
        $repository->shouldReceive('save')->once()->with($members)->andReturnNull();

        $command = new CloseExpiredEntriesCommand();
        $handler = new CloseExpiredEntriesHandler($repository, $dispatcher);

        $handler->handle($command);
    }
}