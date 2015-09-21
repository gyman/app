<?php

namespace Gyman\Domain\Handler;

use Gyman\Domain\Command\CloseEntryCommand;
use Gyman\Domain\Event\EntryEvent;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Model\Voucher;
use Gyman\Domain\Repository\EntryRepositoryInterface;
use Gyman\Domain\Repository\MemberRepositoryInterface;
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
    private $repository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param EntryRepositoryInterface $repository
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
    public function handle(CloseEntryCommand $command, UserInterface $author)
    {
        /** @var Member $member */
        $member = $command->member;

        $entry = $member->lastEntry();
        $member->exitLastEntry();

        $this->repository->insert($member);
        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
