<?php

namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

class UniqueMemberEmail extends Constraint
{
    public $message = 'Email \'%email%\' already registered!';

    public function validatedBy()
    {
        return 'UniqueMemberEmailValidator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
