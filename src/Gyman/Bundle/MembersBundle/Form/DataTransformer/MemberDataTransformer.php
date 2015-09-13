<?php
namespace Gyman\Bundle\MembersBundle\Form\DataTransformer;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\MembersBundle\Entity\MemberRepository;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class MemberDataTransformer
 * @package Gyman\Bundle\MembersBundle
 */
class MemberDataTransformer implements DataTransformerInterface
{
    /**
     * @var MemberRepository
     */
    private $repository;
    /**
     * @var string
     */
    private $fotoDestinationDir;

    /**
     * MemberDataTransformer constructor.
     * @param MemberRepository $memberRepository
     * @param $fotoDestinationDir
     */
    public function __construct(MemberRepository $memberRepository, $fotoDestinationDir)
    {
        $this->repository = $memberRepository;
        $this->fotoDestinationDir = $fotoDestinationDir;
    }

    /**
     * @param Member $member
     * @return null|MemberDTO
     */
    public function transform($member)
    {
        if ($member === null) {
            return;
        }

        $details = $member->details();

        $dto = new MemberDTO();
        $dto->id = $member->id();
        $dto->firstname = $details->firstname();
        $dto->lastname = $details->lastname();
        $dto->birthdate = $details->birthdate();
        $dto->phone = $details->phone();
        $dto->notes = $details->notes();
        $dto->foto = null;
        $dto->zipcode = $details->zipcode();
        $dto->gender = $details->gender();
        $dto->belt = $details->belt()->color();
        $dto->barcode = $details->barcode()->barcode();
        $dto->email = $member->email()->email();

        return $dto;
    }

    /**
     * @param MemberDTO $dto
     * @return Member
     */
    public function reverseTransform($dto)
    {
        /** @var Member $member */
        $member = $this->repository->findOneById($dto->id);

        if ($member) {
            if ($dto->foto instanceof UploadedFile) {
                $filename = sprintf('%s.%s', md5(microtime(true)), $dto->foto->getClientOriginalExtension());
                $dto->foto->move($this->fotoDestinationDir, $filename);

                $dto->foto = $filename;
            }

            $member->updateWithDto($dto);
        } else {
            $member = MemberFactory::createFromDto($dto);
        }

        return $member;
    }
}
