<?php
namespace Gyman\Domain;

use DateTime;
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

    /** @var DateTime */ // @todo zamienić z poniższym na value object
    protected $voucherEndDate;

    /** @var int */
    protected $voucherLeftAmount;

    /** @var string */
    protected $barcode;

    public function __construct(string $id, $firstname, $lastname, string $foto = null, string $lastEntryId = null, string $currentVoucherId = null, DateTime $voucherEndDate = null, int $voucherLeftAmount = null, ?string $barcode)
    {
        $this->id = Uuid::fromString($id);
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->foto = new Foto($foto);
        $this->lastEntryId = $lastEntryId ? Uuid::fromString($lastEntryId) : null;
        $this->currentVoucherId = $currentVoucherId ? Uuid::fromString($currentVoucherId) : null;
        $this->voucherEndDate = $voucherEndDate;
        $this->voucherLeftAmount = $voucherLeftAmount;
        $this->barcode = $barcode;
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

    public function voucherEndDate(): DateTime
    {
        return $this->voucherEndDate;
    }

    public function voucherLeftAmount(): int
    {
        return $this->voucherLeftAmount;
    }

    public function barcode() : ?string
    {
        return $this->barcode;
    }
}