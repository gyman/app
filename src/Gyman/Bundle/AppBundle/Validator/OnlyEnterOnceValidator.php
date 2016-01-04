<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Domain\Command\OpenEntryCommand;
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

        foreach($member->entries() as $entry) {
            if($entry->occurrence()->id() == $command->occurrence->id())
            {
                $this->context->buildViolation($constraint->message)
                    ->atPath('occurrence')
                    ->addViolation();
                return;
            }
        }
    }
}
