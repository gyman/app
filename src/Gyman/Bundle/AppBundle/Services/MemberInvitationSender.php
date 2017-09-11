<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Domain\Member;

class MemberInvitationSender
{
    protected $mailer;

    public function sendInvitation(Member $member, $token)
    {
        $this->mailer;
    }
}