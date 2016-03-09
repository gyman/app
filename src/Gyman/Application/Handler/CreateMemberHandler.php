<?php
namespace Gyman\Application\Handler;

use Gyman\Application\Factory\MemberFactory;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Event\MemberEvent;

class CreateMemberHandler extends UpdateMemberHandler
{
    const SUCCESS = 'gyman.member_created.success';
    const FAILURE = 'gyman.member_created.failure';

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
