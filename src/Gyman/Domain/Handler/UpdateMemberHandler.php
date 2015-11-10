<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Entity\MemberRepository;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Event\MemberEvent;
use Gyman\Domain\Exception\MemberNotFoundException;
use Gyman\Domain\Model\Details;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class UpdateMemberHandler
{
    const SUCCESS = 'gyman.member_updated.success';
    const FAILURE = 'gyman.member_updated.failure';

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
     * @param UpdateMemberCommand $command
     * @param null $author
     * @throws MemberNotFoundException
     */
    public function handle(MemberCommandInterface $command, $author = null)
    {
        /** @var Member $member */
        $member = $this->memberRepository->findOneById($command->id);

        if (is_null($member)) {
            throw new MemberNotFoundException();
        }

        $this->uploadHandler->handle($command);

        $details = Details::createFromMemberUpdateCommand($command);
        $email = EmailAddress::createFromMemberUpdateCommand($command);

        $member->updateDetails($details);
        $member->updateEmail($email);
        $member->setSections($command->sections);

        $this->memberRepository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
