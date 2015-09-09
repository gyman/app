<?php
namespace Gyman\Component\Vouchers\Service;

use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Event\EntryEvent;
use Gyman\Component\Vouchers\Model\Entry;
use Gyman\Component\Vouchers\Repository\EntryRepositoryInterface;
use Gyman\Component\Vouchers\Repository\VoucherRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class OpenEntry
 * @package Gyman\Component\Vouchers
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
            $this->dispatcher->dispatch(self::FAILURE, new EntryEvent($member, $entry, $author, $e));
            throw $e;
        }

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($member, $entry, $author));
    }
}
