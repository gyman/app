<?php

namespace Dende\ScheduleBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Description of RequiredIfNoNewActivityConstraint
 *
 * @author uirapuru
 */
class RequiredIfNoNewActivityValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        $newActivity = $this->context->getRoot()->get("newActivity")->getData();

        if (!is_null($newActivity))
        {
            return;
        }

        if (is_null($value))
        {
            $this->context->addViolation(
                $constraint->message, array('%string%' => $value)
            );
        }
    }

}
