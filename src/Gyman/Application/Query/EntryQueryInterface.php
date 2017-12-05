<?php
namespace Gyman\Application\Query;

use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Member;

interface EntryQueryInterface
{
    public function findLastByMember(Member $member, int $limit) : Collection;
}