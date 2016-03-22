<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Event\MemberEvent;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class CreateMemberHandler
{
    const SUCCESS = 'gyman.member_created.success';
    const FAILURE = 'gyman.member_created.failure';

    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * @var UploadMemberFotoHandler
     */
    protected $uploadHandler;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * UpdateMemberHandler constructor.
     * @param MemberRepositoryInterface $memberRepository
     * @param UploadMemberFotoHandler $uploadHandler
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $memberRepository, UploadMemberFotoHandler $uploadHandler, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $memberRepository;
        $this->uploadHandler = $uploadHandler;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param CreateMemberCommand $command
     * @param null $author
     */
    public function handle(CreateMemberCommand $command, $author = null)
    {
        $this->uploadHandler->handle($command);
        $member = MemberFactory::createFromCreateMemberCommand($command);
        $this->memberRepository->insert($member);
        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
