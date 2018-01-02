<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Application\Repository\MemberRepositoryInterface;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Gyman\Domain\Member\Details\Barcode;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class UniqueMemberBarcodeValidator extends ConstraintValidator
{
    /**
     * @var MemberRepository
     */
    private $repository;

    /**
     * @param MemberRepositoryInterface $repository
     */
    public function __construct(MemberRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param UpdateMemberCommand $command
     * @param Constraint          $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        $member = $this->repository->findOneByBarcode(new Barcode($command->barcode));

        if (null !== $member && !$this->areTheSame($member, $command)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('barcode')
                ->setParameter('%barcode%', $command->barcode)
                ->addViolation();
        }
    }

    /**
     * @param Member              $member
     * @param UpdateMemberCommand $command
     *
     * @return bool
     */
    private function areTheSame(Member $member, UpdateMemberCommand $command)
    {
        return $member->id() === $command->id;
    }
}
