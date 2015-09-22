<?php

namespace Gyman\Domain\Handler;

use Gyman\Bundle\AppBundle\Factory\MemberFactory;
use Gyman\Domain\Command\CreateMemberCommand;
use Gyman\Domain\Command\MemberCommandInterface;
use Gyman\Domain\Event\MemberEvent;

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
