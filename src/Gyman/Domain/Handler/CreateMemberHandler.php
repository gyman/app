<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Gyman\Domain\Command\UpdateMemberCommand;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateMemberHandler extends UpdateMemberHandler
{
    /**
     * @param UpdateMemberCommand $command
     */
    public function handle(UpdateMemberCommand $command)
    {
        if ($command->uploadFile instanceof UploadedFile) {
            $filename = sprintf('%s.%s', md5(microtime(true)), strtolower($command->uploadFile->getClientOriginalExtension()));
            $command->uploadFile->move($this->fotoDestinationDir, $filename);
            $command->foto = $filename;
        }

        $member = MemberFactory::createFromCreateMemberCommand($command);

        $this->memberRepository->insert($member);
    }
}
