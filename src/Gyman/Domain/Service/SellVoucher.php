<?php
namespace Gyman\Domain\Service;

use Gyman\Domain\Event\VoucherEvent;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Model\Voucher;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Gyman\Domain\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SellVoucher
 * @package Gyman\Domain
 */
class SellVoucher
{
    const SUCCESS = 'gyman.voucher_sell.success';
    const FAILURE = 'gyman.voucher_sell.failure';

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
     * @param Member $member
     * @param Voucher $voucher
     * @param UserInterface $author
     */
    public function sellVoucher(Member $member, Voucher $voucher, UserInterface $author)
    {
        $member->addVoucher($voucher);

        $this->repository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($member, $voucher, $author));
    }
}
