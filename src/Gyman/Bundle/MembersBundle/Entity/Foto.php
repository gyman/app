<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Domain\Model\Foto as BaseFoto;

/**
 * Class Foto
 * @package Gyman\Bundle\MembersBundle
 */
class Foto extends BaseFoto
{
    /**
     * @param MemberDTO $dto
     */
    public function updateWithDto(MemberDTO $dto)
    {
        $this->foto = $dto->foto;
    }
}
