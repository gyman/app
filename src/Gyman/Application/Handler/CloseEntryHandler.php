<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Command\CloseEntryCommand;
use Gyman\Application\Event\EntryEvent;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\EntryRepositoryInterface;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CloseEntryHandler
 * @package Gyman\Domain
 */
final class CloseEntryHandler
{
    const SUCCESS = 'gyman.close_entry.success';
    const FAILURE = 'gyman.close_entry.failure';

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
     * @param MemberRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CloseEntryCommand $command
     * @param UserInterface $author
     * @throws \Gyman\Application\Exception\MemberHasNoLastEntryException
     */
    public function handle(CloseEntryCommand $command, UserInterface $author = null)
    {
        /** @var Member $member */
        $member = $command->member;
        $member->exitLastEntry();

        $this->memberRepository->save($member);
//        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
