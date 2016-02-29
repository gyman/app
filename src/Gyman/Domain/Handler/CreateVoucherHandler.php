<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Entity\Entry;
use Gyman\Bundle\AppBundle\Factory\VoucherFactory;
use Gyman\Domain\Command\CreateVoucherCommand;
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
     * @param CreateVoucherCommand $createVoucherCommand
     * @param UserInterface $author
     * @throws \Exception
     * @throws \Gyman\Domain\Exception\VouchersAreOverlappingException
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
            $creditEntries->forAll(function($key, Entry $entry) use ($voucher) {
                $entry->payOffWithVoucher($voucher);
            });
        }

        $this->repository->insert($voucher->member());

//        $this->dispatcher->dispatch(self::SUCCESS, new VoucherEvent($voucher, $author));
    }
}
