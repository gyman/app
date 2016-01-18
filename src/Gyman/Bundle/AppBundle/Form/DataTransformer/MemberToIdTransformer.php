<?php
namespace Gyman\Bundle\AppBundle\Form\DataTransformer;

use DateTime;
use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\MemberRepository;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Fixes start and end date hour in voucher
 *
 * Class VoucherDateTransformer
 * @package Gyman\Bundle\AppBundle\Form\DataTransformer
 */
final class MemberToIdTransformer implements DataTransformerInterface
{
    /**
     * @var MemberRepository
     */
    protected $memberRepository;

    /**
     * MemberToIdTransformer constructor.
     * @param MemberRepository $memberRepository
     */
    public function __construct(MemberRepository $memberRepository)
    {
        $this->memberRepository = $memberRepository;
    }

    /**
     * @param Member $member
     * @return string
     */
    public function transform($member)
    {
        return $member->id();
    }

    /**
     * @param string $id
     * @return Member
     */
    public function reverseTransform($id)
    {
        return $this->memberRepository->find($id);
    }
}
