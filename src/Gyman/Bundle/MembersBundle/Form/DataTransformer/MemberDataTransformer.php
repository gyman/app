<?php
namespace Gyman\Bundle\MembersBundle\Form\DataTransformer;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Class MemberDataTransformer
 * @package Gyman\Bundle\MembersBundle
 */
class MemberDataTransformer implements DataTransformerInterface
{
    /**
     * @param Member $voucher
     * @return null|MemberDTO
     */
    public function transform($voucher)
    {
        if ($voucher === null) {
            return;
        }

        $details = $voucher->details();

        $dto = new MemberDTO();
        $dto->firstname = $details->firstname();
        $dto->lastname = $details->lastname();
        $dto->birthdate = $details->birthdate();
        $dto->phone = $details->phone();
        $dto->notes = $details->notes();
        $dto->foto = new File(Globals::applyFilePath($details->foto()->foto()));
        $dto->zipcode = $details->zipcode();
        $dto->gender = $details->gender();
        $dto->belt = $details->belt()->color();
        $dto->barcode = $details->barcode()->barcode();

        return $dto;
    }

    /**
     * @param MemberDTO $dto
     * @return Member
     */
    public function reverseTransform($dto)
    {
        $member = MemberFactory::createFromDto($dto);

        return $member;
    }
}
