<?php
namespace Gyman\Bundle\MembersBundle\Entity;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Component\Members\Model\EmailAddress as BaseEmailAddress;

class EmailAddress extends BaseEmailAddress
{
    public function updateWithDto(MemberDTO $dto)
    {
        $this->email = $dto->email;
    }
}
