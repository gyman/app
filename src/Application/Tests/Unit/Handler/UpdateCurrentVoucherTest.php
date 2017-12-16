<?php
namespace Gyman\Application\Tests\Unit\Handler;

use Gyman\Application\Command\UpdateCurrentVoucherCommand;
use Gyman\Application\Handler\UpdateCurrentVoucherHandler;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Bundle\AppBundle\Repository\VoucherRepository;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Mockery as m;

class UpdateCurrentVoucherTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown(){
        parent::tearDown();
        m::close();
    }

    public function testHandle() {
        $voucherMock1 = m::mock(Voucher::class);
        $voucherMock2 = m::mock(Voucher::class);
        $voucherMock3 = m::mock(Voucher::class);

        $memberMock1 = m::mock(Member::class);
        $memberMock1->shouldReceive("setCurrentVoucher")->times(1)->with($voucherMock1)->andReturnNull();

        $memberMock2 = m::mock(Member::class);
        $memberMock2->shouldReceive("setCurrentVoucher")->times(1)->with($voucherMock2)->andReturnNull();

        $memberMock3 = m::mock(Member::class);
        $memberMock3->shouldReceive("setCurrentVoucher")->times(1)->with($voucherMock3)->andReturnNull();

        $voucherMock1->shouldReceive("member")->times(1)->withNoArgs()->andReturn($memberMock1);
        $voucherMock2->shouldReceive("member")->times(1)->withNoArgs()->andReturn($memberMock2);
        $voucherMock3->shouldReceive("member")->times(1)->withNoArgs()->andReturn($memberMock3);

        $vouchers = [
            $voucherMock1,
            $voucherMock2,
            $voucherMock3,
        ];
        
        $voucherRepository = m::mock(VoucherRepository::class);
        $voucherRepository->shouldReceive('findAllNotSetCurrentVouchers')->once()->withNoArgs()->andReturn($vouchers);

        $memberRepository = m::mock(MemberRepository::class);
        $memberRepository->shouldReceive('save')->once()->andReturnNull();

        $command = new UpdateCurrentVoucherCommand();
        $handler = new UpdateCurrentVoucherHandler($memberRepository, $voucherRepository);

        $handler->handle($command);
    }
}