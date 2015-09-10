<?php
namespace Gyman\Component\Vouchers\Service;

use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Members\Repository\MemberRepositoryInterface;
use Gyman\Component\Vouchers\Event\VoucherEvent;
use Gyman\Component\Vouchers\Model\Voucher;
use Gyman\Component\Vouchers\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class SellVoucher
 * @package Gyman\Component\Vouchers
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
