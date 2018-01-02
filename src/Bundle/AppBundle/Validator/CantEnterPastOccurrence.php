<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

class CantEnterPastOccurrence extends Constraint
{
    public $message = 'Cant enter activity that has finished';

    public function validatedBy()
    {
        return 'CantEnterPastOccurrenceValidator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
