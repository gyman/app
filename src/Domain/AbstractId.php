<?php
namespace Gyman\Domain;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class AbstractId implements IdInterface
{
    /** @var string */
    protected $id;

    protected function __construct(UuidInterface $id)
    {
        $this->id = $id;
    }

    public static function create(UuidInterface $id = null): IdInterface
    {
        return $id ? new static($id) : new static(Uuid::uuid4());
    }

    public function id(): string
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function equals(IdInterface $id): bool
    {
        return $id->__toString() === $this->__toString();
    }
}
