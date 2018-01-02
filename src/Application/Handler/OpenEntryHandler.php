<?php

declare(strict_types=1);

namespace Gyman\Application\Handler;

use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Application\Event\EntryEvent;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Domain\UserInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class CreateVoucherHandler.
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
     * OpenEntryHandler constructor.
     *
     * @param MemberRepositoryInterface $memberRepository
     * @param EventDispatcherInterface  $dispatcher
     */
    public function __construct(MemberRepositoryInterface $memberRepository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $memberRepository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param OpenEntryCommand   $command
     * @param UserInterface|null $author
     *
     * @throws \Exception
     * @throws \Gyman\Application\Exception\NoCurrentVoucherForVoucherEntryException
     */
    public function handle(OpenEntryCommand $command, UserInterface $author = null)
    {
        $entry = EntryFactory::createFromOpenEntryCommand($command);

        $member = $command->member;
        $member->enter($entry);

        $this->memberRepository->save($member);

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
