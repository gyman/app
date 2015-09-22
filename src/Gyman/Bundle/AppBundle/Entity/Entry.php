<?php
namespace Gyman\Bundle\AppBundle\Entity;

use DateTime;
use Gyman\Domain\Model\Entry as BaseEntry;

class Entry extends BaseEntry
{
    /**
     * @var DateTime $created
     */
    protected $createdAt;

    /**
     * @var DateTime $modified
     */
    protected $updatedAt;

    /**
     * @var Datetime $deletedAt
     */
    protected $deletedAt;
}
