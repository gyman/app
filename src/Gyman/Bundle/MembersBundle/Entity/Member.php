<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use DateTime;
use Gyman\Bundle\DefaultBundle\Lib\Globals;
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
}
