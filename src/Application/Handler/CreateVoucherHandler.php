<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Application\Factory\VoucherFactory;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateVoucherHandler.
 */
class CreateVoucherHandler
{
    const SUCCESS = 'gyman.voucher_created.success';
    const FAILURE = 'gyman.voucher_created.failure';

    /**
     * @var MemberRepositoryInterface
     */
    private $memberRepository;

    /**
     * @var EntryRepositoryInterface
     */
    private $entriesRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     *
     * @param MemberRepositoryInterface $repository
     * @param EntryRepositoryInterface  $entriesRepository
     * @param EventDispatcherInterface  $dispatcher
     */
    public function __construct(MemberRepositoryInterface $repository, EntryRepositoryInterface $entriesRepository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $repository;
        $this->entriesRepository = $entriesRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CreateVoucherCommand $createVoucherCommand
     * @param UserInterface        $author
     *
     * @throws \Exception
     * @throws \Gyman\Application\Exception\VouchersAreOverlappingException
     *
     * @internal param Member $member
     * @internal param Voucher $voucher
     */
    public function handle(CreateVoucherCommand $createVoucherCommand, UserInterface $author = null)
    {
        $voucher = VoucherFactory::createFromVoucherCommand($createVoucherCommand);
        $voucher->member()->addVoucher($voucher);

        $creditEntries = $voucher->member()->filterCreditEntries();

        if (null !== $createVoucherCommand->maximumAmount && $createVoucherCommand->maximumAmount < count($creditEntries)) {
            throw new \Exception(sprintf(
                'User has %d credit entries to be taken automaticaly from new voucher, you have to add bigger number of maximum amount of entries',
                count($creditEntries)
            ));
        }

        if (!$creditEntries->isEmpty()) {
            array_map(function (Entry $entry) use ($voucher) {
                $entry->payOffWithVoucher($voucher);
            }, $creditEntries->toArray());
        }

        $this->memberRepository->save($voucher->member());
        $this->entriesRepository->save($creditEntries);
//        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
