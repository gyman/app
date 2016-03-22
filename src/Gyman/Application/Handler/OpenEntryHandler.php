<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Factory\EntryFactory;
use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Application\Event\EntryEvent;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateVoucherHandler
 * @package Gyman\Domain
 */
final class OpenEntryHandler
{
    const SUCCESS = 'gyman.open_entry.success';
    const FAILURE = 'gyman.open_entry.failure';

    /**
     * @var MemberRepositoryInterface
     */
    private $memberRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param MemberRepositoryInterface $memberRepository
     * @param EventDispatcherInterface $dispatcher
     * @internal param EntryRepositoryInterface $voucherRepository
     */
    public function __construct(MemberRepositoryInterface $memberRepository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $memberRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Member $member
     * @param Voucher $voucher
     * @param UserInterface $author
     */
    public function handle(OpenEntryCommand $command, UserInterface $author)
    {
        $entry = EntryFactory::createFromOpenEntryCommand($command);

        $member = $command->member;
        $member->enter($entry);

        $this->memberRepository->save($member);

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
