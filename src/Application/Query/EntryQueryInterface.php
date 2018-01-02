<?php

declare(strict_types=1);

namespace Gyman\Application\Query;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Gyman\Domain\Member;

interface EntryQueryInterface
{
    public function findLastByMember(Member $member, int $limit): Collection;

    public function findByDates(Member $member, DateTime $startDate, DateTime $endDate): Collection;
}
