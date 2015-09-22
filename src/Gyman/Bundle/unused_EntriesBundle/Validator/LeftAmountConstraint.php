<?php
namespace Gyman\Bundle\EntriesBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class LeftAmountConstraint extends Constraint
{
    public $message = 'Brak wejść na karnecie';

    public function validatedBy()
    {
        return 'validator.left_amount_validator';
    }

//    public function getTargets() {
//        return self::CLASS_CONSTRAINT;
//    }
}
