<?php
namespace Gyman\Bundle\EntriesBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ActivityConstraint extends Constraint
{
    public $message = 'Karnet uczestnika nie zawiera tych zajęć!';

    public function validatedBy()
    {
        return 'Gyman\Bundle\EntriesBundle\Validator\ActivityValidator';
    }
}
