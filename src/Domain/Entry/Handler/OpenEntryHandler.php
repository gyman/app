<?php
namespace Gyman\Domain\Entry\Handler;

use DateTime;
use Gyman\Application\Factory\EntryFactory;
use Gyman\Application\Event\EntryEvent;
use Gyman\Domain\Entry;
use Gyman\Domain\Entry\Command\OpenEntry;
use Gyman\Domain\UserInterface;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param MemberRepositoryInterface $memberRepository
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $memberRepository, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $memberRepository;
        $this->dispatcher = $dispatcher;
    }

    public function handle(OpenEntry $command, UserInterface $author = null)
    {
        $member = $this->memberRepository->findOneByBarcode($command->barcode());

        if($member === null) {
            throw new NotFoundHttpException();
        }

        $entry = Entry::create(Uuid::uuid4(), new DateTime(), $command->entryType(), $command->price(), $command->occurrence(), $member);

        $member->enter($entry);

        $this->memberRepository->save($member);

        $this->dispatcher->dispatch(self::SUCCESS, new EntryEvent($entry, $author));
    }
}
