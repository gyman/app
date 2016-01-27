<?php
namespace Gyman\Bundle\AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\AppBundle\Globals;
use Gyman\Domain\Model\Details;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Model\Member as BaseMember;

/**
 * Member
 * @codeCoverageIgnore
 */
class Member extends BaseMember
{
    /**
     * @var string
     */
    private $nameSlug;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    private $deletedAt;

    /**
     * @return bool
     */
    public function hasOpenedEntry()
    {
        return !is_null($this->lastEntry()) && $this->lastEntry()->isOpened();
    }

    /**
     * @return bool
     */
    public function isMale()
    {
        return $this->details()->gender() == Details::GENDER_MALE;
    }

    /**
     * @return EmailAddress
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return Details
     */
    public function details()
    {
        return $this->details;
    }

    /**
     * @return ArrayCollection|Voucher[]
     */
    public function vouchers()
    {
        return $this->vouchers;
    }

    /**
     * @return Entry
     */
    public function lastEntry()
    {
        return $this->lastEntry;
    }

    /**
     * @return ArrayCollection|Entry[]
     */
    public function entries()
    {
        return $this->entries;
    }

    /**
     * @return ArrayCollection|Section[]
     */
    public function sections()
    {
        return $this->sections;
    }

    public function removeEntry(Entry $entry)
    {
        if(!is_null($this->lastEntry()) && $this->lastEntry()->id() === $entry->id()) {
            $this->lastEntry = null;
        }

        $this->entries->removeElement($entry);
    }
}
