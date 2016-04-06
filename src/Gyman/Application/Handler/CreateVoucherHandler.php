<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Repository\VoucherRepositoryInterface;
use Gyman\Domain\Entry;
use Gyman\Application\Factory\VoucherFactory;
use Gyman\Application\Command\CreateVoucherCommand;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\MemberRepositoryInterface;
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
     * @var VoucherRepositoryInterface
     */
    private $repository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param MemberRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CreateVoucherCommand $createVoucherCommand
     * @param UserInterface $author
     * @throws \Exception
     * @throws \Gyman\Application\Exception\VouchersAreOverlappingException
     * @internal param Member $member
     * @internal param Voucher $voucher
     */
    public function handle(CreateVoucherCommand $createVoucherCommand, UserInterface $author = null)
    {
        $voucher = VoucherFactory::createFromVoucherCommand($createVoucherCommand);
        $voucher->member()->addVoucher($voucher);

        $creditEntries = $voucher->member()->filterCreditEntries();

        if(!is_null($createVoucherCommand->maximumAmount) && $createVoucherCommand->maximumAmount < count($creditEntries)) {
            throw new \Exception(
                sprintf("User has %d credit entries to be taken automaticaly from new voucher, you have to add bigger number of maximum amount of entries", count($creditEntries))
            );
        }

        if(!$creditEntries->isEmpty()) {
            array_map(function(Entry $entry) use ($voucher) {
                $entry->payOffWithVoucher($voucher);
            }, $creditEntries->toArray());
        }

        $this->repository->save($voucher->member());

//        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
