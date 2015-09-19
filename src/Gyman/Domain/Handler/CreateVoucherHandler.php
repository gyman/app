<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Factory\VoucherFactory;
use Gyman\Domain\Command\VoucherCommandInterface;
use Gyman\Domain\Event\VoucherEvent;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Model\Voucher;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Gyman\Domain\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateVoucherHandler
 * @package Gyman\Domain
 */
class CreateVoucherHandler
{
    const SUCCESS = 'gyman.voucher_created.success';
    const FAILURE = 'gyman.voucher_created.failure';

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
    public function handle(VoucherCommandInterface $command, UserInterface $author)
    {
        $voucher = VoucherFactory::createFromVoucherCommand($command);

        $voucher->member()->addVoucher($voucher);

        $this->repository->insert($voucher->member());

        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
