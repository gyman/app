<?php

declare(strict_types=1);

namespace Gyman\Model\View;

use Ramsey\Uuid\UuidInterface;

class SectionView
{
    /** @var UuidInterface */
    protected $id;

    /** @var string */
    protected $title;

    public function __construct(UuidInterface $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }
}
