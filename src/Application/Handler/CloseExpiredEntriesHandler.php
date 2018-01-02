<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\CloseExpiredEntriesCommand;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CloseEntryHandler.
 *
 * @todo remove
 */
final class CloseExpiredEntriesHandler
{
    const SUCCESS = 'gyman.close_entry.success';
    const FAILURE = 'gyman.close_entry.failure';

    /** @var Member[] */
    public $lastUpdatedData;

    /**
     * @var MemberRepository|MemberRepositoryInterface
     */
    private $memberRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     *
     * @param MemberRepositoryInterface $repository
     * @param EventDispatcherInterface  $dispatcher
     */
    public function __construct(MemberRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CloseExpiredEntriesCommand $command
     * @param UserInterface|null         $author
     */
    public function handle(CloseExpiredEntriesCommand $command, UserInterface $author = null)
    {
        $members = $this->memberRepository->findAllByExpiredLastEntry();

        /** @var Member $member */
        foreach ($members as $member) {
            $member->exitLastEntry();
        }

        $this->memberRepository->save($members);
        $this->lastUpdatedData = $members;
    }
}
