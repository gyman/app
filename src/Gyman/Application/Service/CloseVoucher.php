<?php
namespace Gyman\Application\Service;

use Gyman\Application\Command\CloseVoucherCommand;
use Gyman\Application\Event\VoucherEvent;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Application\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CloseVoucher
 * @package Gyman\Domain
 */
class CloseVoucher
{
    const SUCCESS = 'gyman.voucher_close.success';
    const FAILURE = 'gyman.voucher_close.failure';

    /**
     * @var VoucherRepositoryInterface
     */
    private $voucherRepository;

    /** @var  MemberRepositoryInterface */
    private $memberRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CloseVoucher constructor.
     * @param VoucherRepositoryInterface $voucherRepository
     * @param MemberRepositoryInterface $memberRepository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(VoucherRepositoryInterface $voucherRepository, MemberRepositoryInterface $memberRepository, EventDispatcherInterface $dispatcher)
    {
        $this->voucherRepository = $voucherRepository;
        $this->memberRepository = $memberRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CloseVoucherCommand $command
     * @param UserInterface|null $user
     * @throws \Gyman\Application\Exception\VoucherClosingDateBeforeOpeningException
     */
    public function handle(CloseVoucherCommand $command, UserInterface $user = null)
    {
        $voucher = $command->voucher;
        $member = $command->voucher->member();

        $voucher->close($command->closingDate);
        $member->unsetCurrentVoucher();

        $this->voucherRepository->save($voucher);
        $this->memberRepository->save($member);

        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $user));
    }
}
