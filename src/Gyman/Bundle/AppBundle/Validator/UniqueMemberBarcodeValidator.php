<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\MemberRepository;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Model\Barcode;
use Gyman\Domain\Repository\MemberRepositoryInterface;
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
     * @param Constraint $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        $member = $this->repository->findOneByBarcode(new Barcode($command->barcode));

        if (!is_null($member) && !$this->areTheSame($member, $command)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('barcode')
                ->setParameter('%barcode%', $command->barcode)
                ->addViolation();
        }
    }

    /**
     * @param Member $member
     * @param UpdateMemberCommand $command
     * @return bool
     */
    private function areTheSame(Member $member, UpdateMemberCommand $command)
    {
        return $member->id() === $command->id;
    }
}
