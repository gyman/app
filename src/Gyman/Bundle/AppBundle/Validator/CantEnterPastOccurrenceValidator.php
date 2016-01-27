<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Domain\Command\OpenEntryCommand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class CantEnterPastOccurrenceValidator extends ConstraintValidator
{
    /**
     * @param OpenEntryCommand $command
     * @param Constraint $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        if(is_null($command->occurrence)) {
            return;
        }

        if($command->occurrence->isPast())
        {
            $this->context->buildViolation($constraint->message)
                ->atPath('occurrence')
                ->addViolation();
        }
    }
}
