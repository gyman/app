<?php
namespace Gyman\Domain;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Section\SectionId;
use Ramsey\Uuid\Uuid;

class Section
{
    /**
     * Doctrine id
     * @var int
     */
    protected $id;

    /**
     * @var SectionId
     */
    protected $sectionId;

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

    public function __construct(SectionId $id = null, string $title = '', Calendar $calendar = null, Collection $members = null, int $orderNumber = 999)
    {
        $this->sectionId = $id ?: SectionId::create();
        $this->title = $title;
        $this->calendar = $calendar ?: new Calendar(null, $title);
        $this->members = $members ?: new ArrayCollection();
        $this->orderNumber = $orderNumber;
    }

    /**
     * @return string
     */
    public function title() : string
    {
        return $this->title;
    }

    /**
     * @return Calendar
     */
    public function calendar() : Calendar
    {
        return $this->calendar;
    }

    public function id() : SectionId
    {
        return $this->sectionId;
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

    /**
     * Unfortunately, needed by symfony form
     * @todo please remove if possible
     * @param string $id
     */
    public function setId(string $id = null){
        $this->sectionId = $id ? SectionId::create(Uuid::fromString($id)) : SectionId::create();
    }
}
