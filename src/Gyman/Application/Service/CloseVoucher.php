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
    private $repository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param VoucherRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(VoucherRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
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

        $this->repository->save($voucher);

        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $user));
    }
}
