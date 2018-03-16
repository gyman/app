<?php
namespace Gyman\Domain;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Section\SectionId;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Section
{
    /**
     * @var Uuid
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var Calendar
     */
    protected $calendar;

    /**
     * @var Member[]|ArrayCollection
     */
    protected $members;

    /**
     * @var DateTime
     */
    protected $deletedAt;

    /**
     * @var DateTime
     */
    protected $updatedAt;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var int
     */
    protected $orderNumber;

    /** @var User */
    protected $instructor;

    public function __construct(SectionId $id = null, ?string $title = '', ?Calendar $calendar = null, ?Collection $members = null, ?int $orderNumber = 999, ?User $instructor = null)
    {
        $this->id = $id ?: SectionId::create();
        $this->title = $title;
        $this->calendar = $calendar ?: new Calendar(null, $title, null, null);
        $this->members = $members ?: new ArrayCollection();
        $this->orderNumber = $orderNumber;
        $this->instructor = $instructor;

        $this->createdAt = new DateTime();
    }

    public function title() : string
    {
        return $this->title;
    }

    public function calendar() : Calendar
    {
        return $this->calendar;
    }

    public function id() : UuidInterface
    {
        return $this->id;
    }

    public function addMember(Member $member)
    {
        $this->members->add($member);
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function members() : Collection
    {
        return $this->members;
    }

    public function setInstructor(?User $instructor) : void
    {
        $this->instructor = $instructor;
    }

    public function instructor(): ?User
    {
        return $this->instructor;
    }

    public function setCalendar(Calendar $calendar): void
    {
        $this->calendar = $calendar;
    }

    public function setDeletedAt(?DateTime $dateTime) : void
    {
        $this->deletedAt = $dateTime;
    }
}
