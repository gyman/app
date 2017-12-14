<?php
namespace Gyman\Domain;

use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;
/**
 * Class User
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

    /** @var Collection|Section[]|null */
    private $sections;

    public function firstname() : ?string
    {
        return $this->firstname;
    }

    public function lastname() : ?string
    {
        return $this->lastname;
    }

    public function getFullname() : ?string
    {
        $name = $this->firstname . ' ' . $this->lastname;

        if(trim($name) === '') {
            return null;
        }

        return $name;
    }

    public function getFoto() : string
    {
        return '/bundles/gymanapp/images/no-profile.gif';
    }

    public function setFirstname(string $firstname = null) : void
    {
        $this->firstname = $firstname;
    }

    public function setLastname(string $lastname = null) : void
    {
        $this->lastname = $lastname;
    }

    public function setId(UuidInterface $id) : void
    {
        $this->id = $id;
    }

    public function setInvitationToken(string $token = null) : void
    {
        $this->invitationToken = $token;
    }

    public function setMember(Member $member = null) : void
    {
        $this->member = $member;
    }

    public function invitationToken() : string
    {
        return $this->invitationToken;
    }

    public function member() : ?Member
    {
        return $this->member;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function sections(): ?Collection
    {
        return $this->sections;
    }
}
