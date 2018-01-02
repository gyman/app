<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Application\Command\OpenEntryCommand;
use Gyman\Domain\Entry;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class PriceSetForPaidEntryValidator extends ConstraintValidator
{
    /**
     * @param OpenEntryCommand $command
     * @param Constraint       $constraint
     */
    public function validate($command, Constraint $constraint)
    {
        if (Entry::TYPE_PAID === $command->entryType && (null === $command->price || 0 === $command->price)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('price')
                ->addViolation();
        }
    }
}
