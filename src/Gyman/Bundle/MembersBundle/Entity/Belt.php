<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Domain\Model\Belt as BaseBelt;

/**
 * Class Details
 * @package Gyman\Bundle\MembersBundle
 */
class Belt extends BaseBelt
{
    /**
     * @param MemberDTO $dto
     */
    public function updateWithDto(MemberDTO $dto)
    {
        $this->color = $dto->belt;
    }
}
