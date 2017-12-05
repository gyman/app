<?php

namespace Gyman\Infrastructure\Query;

use Gyman\Domain\Calendar\Event\Occurrence;

interface MemberQueryInterface
{
    public function findAll(): array;

    public function findWithVoucher(): array;

    public function findMembersThatEntered(Occurrence $occurrence): array;
}