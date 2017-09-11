<?php
namespace Gyman\Domain;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 */
class User extends BaseUser implements UserInterface
{
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

    public function firstname() : string
    {
        return $this->firstname;
    }

    public function lastname() : string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->firstname . ' ' . $this->lastname;
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

    public function setInvitationToken(string $token)
    {
        $this->invitationToken = $token;
    }

    public function setMember(Member $member)
    {
        $this->member = $member;
    }

    public function invitationToken() : string
    {
        return $this->invitationToken;
    }

    public function member() : Member
    {
        return $this->member;
    }
}
