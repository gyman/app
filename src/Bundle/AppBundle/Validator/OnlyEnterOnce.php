<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

class OnlyEnterOnce extends Constraint
{
    public $message = 'Cant enter twice the same class';

    public function validatedBy()
    {
        return 'OnlyEnterOnceValidator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
