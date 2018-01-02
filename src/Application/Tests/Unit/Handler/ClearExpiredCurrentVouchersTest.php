<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Unit\Handler;

use Gyman\Application\Command\ClearExpiredCurrentVouchersCommand;
use Gyman\Application\Handler\ClearExpiredCurrentVouchersHandler;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Mockery as m;

/**
 * @coversNothing
 */
class ClearExpiredCurrentVouchersTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        parent::tearDown();
        m::close();
    }

    public function testHandle()
    {
        $memberMock = m::mock(Member::class);
        $memberMock->shouldReceive('unsetCurrentVoucher')->times(3)->withNoArgs()->andReturnNull();

        $members = [
            clone $memberMock,
            clone $memberMock,
            clone($memberMock),
        ];

        $membersIds = [
            ['member_id' => '123'],
            ['member_id' => '234'],
            ['member_id' => '345'],
        ];

        $repository = m::mock(MemberRepository::class);
        $repository->shouldReceive('findAllByExpiredCurrentVoucher')->once()->withNoArgs()->andReturn($membersIds);
        $repository->shouldReceive('findBy')->once()->with(['id' => ['123', '234', '345']])->andReturn($members);
        $repository->shouldReceive('save')->once()->with($members)->andReturnNull();

        $command = new ClearExpiredCurrentVouchersCommand();
        $handler = new ClearExpiredCurrentVouchersHandler($repository);

        $handler->handle($command);
    }
}
