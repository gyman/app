<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Domain\Model\Barcode as BaseBarcode;

/**
 * Class Barcode
 * @package Gyman\Bundle\MembersBundle
 */
class Barcode extends BaseBarcode
{
    /**
     * @param MemberDTO $dto
     */
    public function updateWithDto(MemberDTO $dto)
    {
        $this->barcode = $dto->barcode;
    }
}
