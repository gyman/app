<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Bundle\AppBundle\Entity\Member;
use Gyman\Bundle\AppBundle\Entity\MemberRepository;
use Gyman\Domain\Command\UpdateMemberCommand;
use Gyman\Domain\Model\EmailAddress;
use Gyman\Domain\Repository\MemberRepositoryInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class UniqueMemberEmailValidator extends ConstraintValidator
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
        $member = $this->repository->findOneByEmailAddress(new EmailAddress($command->email));

        if (!is_null($member) && !$this->areTheSame($member, $command)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('email')
                ->setParameter('%email%', $command->email)
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
