<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Application\Command\MemberCommandInterface;
use Gyman\Domain\Member;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Application\Command\UpdateMemberCommand;
use Gyman\Domain\Member\EmailAddress;
use Gyman\Application\Repository\MemberRepositoryInterface;
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

    private function areTheSame(Member $member, MemberCommandInterface $command) : bool
    {
        return $member->id() === $command->id;
    }
}
