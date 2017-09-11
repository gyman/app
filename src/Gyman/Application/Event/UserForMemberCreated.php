<?php


namespace Gyman\Application\Event;


use Gyman\Domain\User;
use Symfony\Component\EventDispatcher\Event;

class UserForMemberCreated extends Event
{
    /** @var User */
    protected $user;

    static $name = 'gyman.member_for_user_created';

    /**
     * UserForMemberCreated constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function user() : User
    {
        return $this->user;
    }
}