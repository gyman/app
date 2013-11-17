<?php

namespace Gyman\Bundle\VouchersBundle\Validator;

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
