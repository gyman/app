<?php

declare(strict_types=1);

namespace Gyman\Domain;

use FOS\UserBundle\Model\User as BaseUser;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

/**
 * Class User.
 */
class User extends BaseUser implements UserInterface, SecurityUserInterface
{
    /**
     * @var Uuid
     */
    protected $id;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /** @var Member */
    private $member;

    /** @var string */
    private $invitationToken;

    public function firstname()
    {
        return $this->firstname;
    }

    public function lastname()
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFullname(): ?string
    {
        $name = $this->firstname . ' ' . $this->lastname;

        if ('' === trim($name)) {
            return null;
        }

        return $name;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return '/bundles/gymanapp/images/no-profile.gif';
    }

    /**
     * @param $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setInvitationToken($token)
    {
        $this->invitationToken = $token;
    }

    public function setMember(Member $member)
    {
        $this->member = $member;
    }

    public function invitationToken(): string
    {
        return $this->invitationToken;
    }

    public function member(): Member
    {
        return $this->member;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }
}
