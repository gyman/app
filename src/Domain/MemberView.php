<?php
namespace Gyman\Domain;

use Gyman\Domain\Member\Details\Foto;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class MemberView
{
    /** @var UuidInterface */
    protected $id;

    /** @var string */
    protected $firstname;

    /** @var string */
    protected $lastname;

    /** @var Foto */
    protected $foto;

    /** @var UuidInterface */
    protected $lastEntryId;

    /** @var UuidInterface */
    protected $currentVoucherId;

    public function __construct(string $id, $firstname, $lastname, string $foto = null, string $lastEntryId = null, string $currentVoucherId = null)
    {
        $this->id = Uuid::fromString($id);
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->foto = new Foto($foto);
        $this->lastEntryId = $lastEntryId ? Uuid::fromString($lastEntryId) : null;
        $this->currentVoucherId = $currentVoucherId ? Uuid::fromString($currentVoucherId) : null;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function firstname(): string
    {
        return $this->firstname;
    }

    public function lastname(): string
    {
        return $this->lastname;
    }

    public function foto(): Foto
    {
        return $this->foto;
    }

    public function lastEntryId(): ?UuidInterface
    {
        return $this->lastEntryId;
    }

    public function currentVoucherId(): ?UuidInterface
    {
        return $this->currentVoucherId;
    }
}