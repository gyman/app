<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Domain\Model\Details as BaseDetails;

/**
 * Class Details
 * @package Gyman\Bundle\MembersBundle
 * @property string $firstname
 * @property string $lastname
 * @property \DateTime $birthdate
 * @property string $gender
 * @property string $zipcode
 * @property string $phone
 * @property string $notes
 * @property Foto $foto
 * @property Barcode $barcode
 * @property Belt $belt
 */
class Details extends BaseDetails
{
    public function updateWithDto(MemberDTO $dto)
    {
        $this->firstname = $dto->firstname;
        $this->lastname = $dto->lastname;
        $this->birthdate = $dto->birthdate;
        $this->gender = $dto->gender;
        $this->zipcode = $dto->zipcode;
        $this->phone = $dto->phone;
        $this->notes = $dto->notes;

        $this->foto->updateWithDto($dto);
        $this->barcode->updateWithDto($dto);
        $this->belt->updateWithDto($dto);
    }
}
