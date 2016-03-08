<?php
namespace Gyman\Application\Service;

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
     * @var MemberRepositoryInterface
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
    public function __construct(MemberRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Voucher $voucher
     * @param UserInterface $author
     */
    public function close(Voucher $voucher, UserInterface $author)
    {
        $voucher->close(new \DateTime());
        $voucher->member()->unsetCurrentVoucher();

        $this->repository->insert($voucher);

        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
