<?php

namespace Gyman\Bundle\SettingsBundle\Validator;


use Symfony\Component\Validator\Constraint;

class UserHasToBeInstructorToBeAssignedToSection extends Constraint
{
    public $message = 'form.validation.user_is_not_instructor';

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}