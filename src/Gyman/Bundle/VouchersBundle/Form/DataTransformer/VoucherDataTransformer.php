<?php
namespace Gyman\Bundle\VouchersBundle\Form\DataTransformer;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Bundle\VouchersBundle\DTO\VoucherDTO;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Bundle\VouchersBundle\Factory\VoucherFactory;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class MemberDataTransformer
 * @package Gyman\Bundle\VouchersBundle
 */
class VoucherDataTransformer implements DataTransformerInterface
{
    /**
     * @param Voucher $voucher
     * @return null|MemberDTO
     */
    public function transform($voucher)
    {
        if ($voucher === null) {
            return;
        }

        $dto = new VoucherDTO();
        $dto->startDate = $voucher->startDate();
        $dto->endDate = $voucher->endDate();
        $dto->price = $voucher->price()->amount();
        $dto->maximumAmount = $voucher->maximumAmount();

        return $dto;
    }

    /**
     * @param VoucherDTO $dto
     * @return Voucher
     */
    public function reverseTransform($dto)
    {
        $voucher = VoucherFactory::createFromDto($dto);

        return $voucher;
    }
}
