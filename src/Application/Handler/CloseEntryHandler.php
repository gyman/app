<?php
namespace Gyman\Application\Handler;

use DateTime;
use Gyman\Application\Command\CloseEntryCommand;
use Gyman\Domain\Member;
use Gyman\Domain\UserInterface;
use Gyman\Domain\Voucher;
use Gyman\Application\Repository\EntryRepositoryInterface;
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
     * @var EntryRepositoryInterface
     */
    private $entryRepository;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * CreateMember constructor.
     * @param EntryRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EntryRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->entryRepository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CloseEntryCommand $command
     * @param UserInterface $author
     * @throws \Gyman\Application\Exception\MemberHasNoLastEntryException
     */
    public function handle(CloseEntryCommand $command, UserInterface $author = null)
    {
        $command->entry->member()->exitLastEntry();
        $command->entry->closeEntry(new DateTime("now"));
        $this->entryRepository->save($command->entry);
//        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
