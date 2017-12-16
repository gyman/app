<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Domain\Entry;
use Gyman\Application\Command\OpenEntryCommand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class OnlyEnterOnceValidator extends ConstraintValidator
{
    /**
     * @param OpenEntryCommand $command
     * @param Constraint $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        $member = $command->member;

        if (count($member->entries()) === 0) {
            return;
        }

        if ($member->checkIfAlreadyEntered($command->occurrence)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('occurrence')
                ->addViolation();
            return;
        }
    }
}
