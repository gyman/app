<?php
namespace Gyman\Domain\Service;

use Gyman\Domain\Event\EntryEvent;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Repository\EntryRepositoryInterface;
use Gyman\Domain\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class OpenEntry
 * @package Gyman\Domain
 */
class OpenEntry
{
    const SUCCESS = 'gyman.open_entry.success';
    const FAILURE = 'gyman.open_entry.failure';

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
     * @param VoucherRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(EntryRepositoryInterface $repository, EventDispatcherInterface $dispatcher)
    {
        $this->repository = $repository;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Member $member
     * @param Entry $entry
     * @param UserInterface $author
     */
    public function openEntry(Member $member, Entry $entry, UserInterface $author)
    {
        try {
            $member->enter($entry);
        } catch (\Exception $e) {
            $this->dispatcher->dispatch(self::FAILURE, new EntryEvent($entry, $author, $e));
            throw $e;
        }

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
