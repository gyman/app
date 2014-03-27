<?php

namespace Dende\EntriesBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PriceNotBlankIfPaidEntryTypeConstraint extends Constraint {

    public $message = 'Cena nie została podana!';

    public function validatedBy() {
        return 'validator.price_set_if_paid_entry_type_validator';
    }

//    public function getTargets() {
//        return self::CLASS_CONSTRAINT;
//    }

}
