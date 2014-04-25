<?php

namespace Dende\ScheduleBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Description of RequiredIfNoNewActivityConstraint
 *
 * @author uirapuru
 */
class AtLeastOneDaySelectedIfNotSingleValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if (count($value) == 0)
        {
            $this->context->addViolation($constraint->message);
        }
    }

}
