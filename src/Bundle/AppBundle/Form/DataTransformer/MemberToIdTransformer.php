<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Form\DataTransformer;

use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Fixes start and end date hour in voucher.
 *
 * Class VoucherDateTransformer
 */
final class MemberToIdTransformer implements DataTransformerInterface
{
    /**
     * @var MemberRepository
     */
    private $memberRepository;

    /**
     * MemberToIdTransformer constructor.
     *
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param Member $member
     *
     * @return string
     */
    public function transform($member)
    {
        return $member->id();
    }

    /**
     * @param string $id
     *
     * @return Member
     */
    public function reverseTransform($id)
    {
        return $this->memberRepository->find($id);
    }
}
