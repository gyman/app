<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\MembersBundle\Entity\MemberRepository;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Exception\MemberNotFoundException;
use Gyman\Domain\Model\Details;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Member;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateMemberHandler
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * @var
     */
    protected $fotoDestinationDir;

    /**
     * UpdateMemberHandler constructor.
     * @param MemberRepositoryInterface $memberRepository
     * @param $fotoDestinationDir
     */
    public function __construct(MemberRepositoryInterface $memberRepository, $fotoDestinationDir)
    {
        $this->memberRepository = $memberRepository;
        $this->fotoDestinationDir = $fotoDestinationDir;
    }

    /**
     * @param UpdateMemberCommand $command
     * @throws MemberNotFoundException
     */
    public function handle(UpdateMemberCommand $command)
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
    }
}
