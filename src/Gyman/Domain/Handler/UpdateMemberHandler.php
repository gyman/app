<?php
namespace Gyman\Domain\Handler;

use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Exception\MemberNotFoundException;
use Gyman\Domain\Model\Details;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpdateMemberHandler
{
    /**
     * @var MemberRepositoryInterface
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
        $member = $this->memberRepository->findOneByEmailAddress(new EmailAddress($command->email));

        if (is_null($member)) {
            throw new MemberNotFoundException();
        }

        if ($command->uploadFile instanceof UploadedFile) {
            $filename = sprintf('%s.%s', md5(microtime(true)), strtolower($command->uploadFile->getClientOriginalExtension()));
            $command->uploadFile->move($this->fotoDestinationDir, $filename);
            $command->foto = $filename;
        }

        $details = Details::createFromMemberUpdateCommand($command);

        $member->updateDetails($details);

        $this->memberRepository->insert($member);
    }
}
