<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MaximumAmountGreaterThanCreditEntriesConstraint extends Constraint
{
    public $message = 'Voucher error dates';

    public function validatedBy()
    {
        return 'validator.voucher_amount_for_credit_entries_constraint';
    }

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
