<?php
namespace Gyman\Bundle\MembersBundle\Form\DataTransformer;

use Gyman\Bundle\MembersBundle\DTO\NewMember;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class NewMemberDataTransformer
 * @package Gyman\Bundle\MembersBundle
 */
class NewMemberDataTransformer implements DataTransformerInterface
{
    /**
     * @param Member $member
     * @return null|NewMember
     */
    public function transform($member)
    {
        if ($member === null) {
            return;
        }

        $details = $member->details();

        $dto = new NewMember();
        $dto->firstname = $details->firstname();
        $dto->lastname = $details->lastname();
        $dto->birthdate = $details->birthdate();
        $dto->phone = $details->phone();
        $dto->notes = $details->notes();
        $dto->foto = $details->foto()->foto();
        $dto->zipcode = $details->zipcode();
        $dto->gender = $details->gender();
        $dto->belt = $details->belt()->color();
        $dto->barcode = $details->barcode()->barcode();

        return $dto;
    }

    /**
     * @param NewMember $dto
     * @return Member
     */
    public function reverseTransform($dto)
    {
        $member = MemberFactory::createFromDto($dto);

        return $member;
    }
}
