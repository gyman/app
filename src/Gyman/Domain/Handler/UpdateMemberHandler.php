<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\MembersBundle\Entity\MemberRepository;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Event\MemberEvent;
use Gyman\Domain\Exception\MemberNotFoundException;
use Gyman\Domain\Model\Details;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateMemberHandler
{
    const SUCCESS = 'gyman.member_updated.success';
    const FAILURE = 'gyman.member_updated.failure';

    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * @var
     */
    protected $fotoDestinationDir;

    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * UpdateMemberHandler constructor.
     * @param MemberRepositoryInterface $memberRepository
     * @param $fotoDestinationDir
     * @param EventDispatcherInterface $dispatcher
     */
    public function __construct(MemberRepositoryInterface $memberRepository, $fotoDestinationDir, EventDispatcherInterface $dispatcher)
    {
        $this->memberRepository = $memberRepository;
        $this->fotoDestinationDir = $fotoDestinationDir;
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

        if ($command->uploadFile instanceof UploadedFile) {
            $filename = sprintf('%s.%s', md5(microtime(true)), strtolower($command->uploadFile->getClientOriginalExtension()));
            $command->uploadFile->move($this->fotoDestinationDir, $filename);
            $command->foto = $filename;
        }

        $details = Details::createFromMemberUpdateCommand($command);
        $email = EmailAddress::createFromMemberUpdateCommand($command);

        $member->updateDetails($details);
        $member->updateEmail($email);
        $this->memberRepository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
