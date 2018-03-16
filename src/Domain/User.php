<?php
namespace Gyman\Domain;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

class User extends BaseUser implements UserInterface, SecurityUserInterface
{
    /** @var Uuid */
    protected $id;

    /** @var string */
    private $firstname;

    /** @var string */
    private $lastname;

    /** @var Member */
    private $member;

    /** @var string|null */
    private $invitationToken;

    /** @var Collection|Section[]|null */
    private $sections;

    /** @var DateTime|null */
    private $deletedAt;

    public function __construct(?Uuid $id = null, ?string $firstname = null, ?string $lastname = null, ?Member $member = null, ?string $invitationToken = null, Collection $sections = null)
    {
        parent::__construct();

        $this->id = $id ?: Uuid::uuid4();
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->member = $member;
        $this->invitationToken = $invitationToken;

        $this->sections = $sections ?? new ArrayCollection();
    }

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

    public function invitationToken() : ?string
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

    public function setSections(array $sections = []) : void
    {
        $this->sections = $sections;
    }

    public function addSection(Section $section) : void
    {
        if ($this->sections->contains($section)) {
            return;
        }

        $this->sections[] = $section;

        $section->setInstructor($this);
    }

    public function removeSection(Section $section) : void
    {
        if (!$this->sections->contains($section)) {
            return;
        }

        $this->sections->removeElement($section);

        $section->setInstructor(null);
    }

    public function delete() : void
    {
        $this->deletedAt = new DateTime();
    }

    public function isDeleted() : bool
    {
        return $this->deletedAt === null;
    }

    public function deletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }
}
