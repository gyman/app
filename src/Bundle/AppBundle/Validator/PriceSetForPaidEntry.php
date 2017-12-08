<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

class PriceSetForPaidEntry extends Constraint
{
    public $message = 'Price must be set for paid entry!';

    public function validatedBy()
    {
        return 'PriceSetForPaidEntryValidator';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
