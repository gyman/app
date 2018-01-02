<?php

declare(strict_types=1);

namespace Gyman\Domain;

interface IdInterface
{
    public function __toString(): string;

    public static function create(): self;

    public function id(): string;

    public function equals(self $id): bool;
}
