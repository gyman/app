<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\SectionBundle\Entity\Section;
use Gyman\Bundle\VouchersBundle\Entity\Entry;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Component\Members\Model\Member as BaseMember;

/**
 * Member
 * @codeCoverageIgnore
 */
class Member extends BaseMember
{
    /**
     * @var integer
     */
    private $id;

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
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return Globals::applyGalleryDir($this->foto);
    }

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
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection|Section[]
     */
    public function sections()
    {
        return $this->sections;
    }
}
