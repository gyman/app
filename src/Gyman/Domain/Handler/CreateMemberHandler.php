<?php
namespace Gyman\Domain\Handler;

use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Event\MemberEvent;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CreateMemberHandler extends UpdateMemberHandler
{
    const SUCCESS = 'gyman.member_created.success';
    const FAILURE = 'gyman.member_created.failure';

    /**
     * @param CreateMemberCommand $command
     * @param null $author
     */
    public function handle(MemberCommandInterface $command, $author = null)
    {
        if ($command->uploadFile instanceof UploadedFile) {
            $filename = sprintf('%s.%s', md5(microtime(true)), strtolower($command->uploadFile->getClientOriginalExtension()));
            $command->uploadFile->move($this->fotoDestinationDir, $filename);
            $command->foto = $filename;
        }

        $member = MemberFactory::createFromCreateMemberCommand($command);

        $this->memberRepository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
