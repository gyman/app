<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Application\Command\OpenEntryCommand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class PriceSetForPaidEntryValidator extends ConstraintValidator
{
    /**
     * @param OpenEntryCommand $command
     * @param Constraint $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        if (is_null($command->price) || $command->price === 0) {
            $this->context->buildViolation($constraint->message)
                ->atPath('price')
                ->addViolation();
        }
    }
}
