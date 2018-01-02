<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\UpdateVoucherCommand;
use Gyman\Application\Event\VoucherEvent;
use Gyman\Application\Repository\VoucherRepositoryInterface;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class UpdateVoucherHandler.
 */
class UpdateVoucherHandler
{
    const SUCCESS = 'gyman.voucher_updated.success';
    const FAILURE = 'gyman.voucher_updated.failure';

    /**
     * @var VoucherRepositoryInterface
     */
    private $voucherRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * UpdateVoucherHandler constructor.
     *
     * @param VoucherRepositoryInterface $voucherRepository
     * @param EventDispatcherInterface   $dispatcher
     */
    public function __construct(VoucherRepositoryInterface $voucherRepository, EventDispatcherInterface $dispatcher)
    {
        $this->voucherRepository = $voucherRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param UpdateVoucherCommand $updateVoucherCommand
     * @param UserInterface|null   $author
     */
    public function handle(UpdateVoucherCommand $updateVoucherCommand, UserInterface $author = null)
    {
        /** @var Voucher $voucher */
        $voucher = $this->voucherRepository->findOneById($updateVoucherCommand->voucherId);
        $voucher->updateWithCommand($updateVoucherCommand);
        $this->voucherRepository->save($voucher);
        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
