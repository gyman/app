<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Application\Command\OpenEntryCommand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class OnlyEnterOnceValidator extends ConstraintValidator
{
    /**
     * @param OpenEntryCommand $command
     * @param Constraint       $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        $member = $command->member;

        if (0 === count($member->entries())) {
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
