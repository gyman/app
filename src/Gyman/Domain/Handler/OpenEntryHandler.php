<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Factory\EntryFactory;
use Gyman\Domain\Command\OpenEntryCommand;
use Gyman\Domain\Event\EntryEvent;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Model\Voucher;
use Gyman\Domain\Repository\EntryRepositoryInterface;
use Gyman\Domain\Repository\MemberRepositoryInterface;
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
     * @param EntryRepositoryInterface $repository
     * @param EventDispatcherInterface $dispatcher
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

        $this->memberRepository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
