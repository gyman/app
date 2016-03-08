<?php
namespace Gyman\Application\Handler;

use Gyman\Bundle\AppBundle\Factory\MemberFactory;
use Gyman\Application\Command\CreateMemberCommand;
use Gyman\Application\Command\MemberCommandInterface;
use Gyman\Application\Event\MemberEvent;

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
        $this->uploadHandler->handle($command);

        $member = MemberFactory::createFromCreateMemberCommand($command);

        $this->memberRepository->insert($member);

        $this->dispatcher->dispatch(self::SUCCESS, new MemberEvent($member, $author));
    }
}
