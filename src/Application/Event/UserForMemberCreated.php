<?php

declare(strict_types=1);

namespace Gyman\Application\Event;

use Gyman\Domain\User;
use Symfony\Component\EventDispatcher\Event;

class UserForMemberCreated extends Event
{
    public static $name = 'gyman.member_for_user_created';
    /** @var User */
    protected $user;

    /** @var string */
    private $currentPassword;

    /**
     * UserForMemberCreated constructor.
     *
     * @param User $user
     */
    public function __construct(User $user, string $currentPassword)
    {
        $this->user = $user;
        $this->currentPassword = $currentPassword;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function currentPassword(): string
    {
        return $this->currentPassword;
    }
}
