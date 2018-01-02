<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class VoucherDateConstraint extends Constraint
{
    public $message = 'Voucher error dates';

    public function validatedBy()
    {
        return 'validator.voucher_date_constraint';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
