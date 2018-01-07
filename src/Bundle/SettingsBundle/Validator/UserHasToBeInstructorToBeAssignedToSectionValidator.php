<?php

namespace Gyman\Bundle\SettingsBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class UserHasToBeInstructorToBeAssignedToSectionValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        $form = $this->context->getRoot();

        $sections = $form['sections']->getData();
        $roles = $form['roles']->getData();

        if(count($sections) > 0 && !in_array("ROLE_INSTRUCTOR", $roles)) {
            $this->context->buildViolation($constraint->message)
                ->atPath('roles')
                ->addViolation();
        }
    }
}