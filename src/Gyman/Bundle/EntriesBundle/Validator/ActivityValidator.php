<?php

namespace Gyman\Bundle\EntriesBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ActivityValidator extends ConstraintValidator
{
    public function validate($entryActivity, Constraint $constraint)
    {
        $form = $this->context->getRoot();

        $entry = $form->getData();

        if ($entry->getEntryType() == "voucher") {
            $activities = $entry->getVoucher()->getActivities();

            if (count($activities) === 0) {
// karnet nie jest typu open
                return true;
            }

            foreach ($activities as $activity) {
                if ($activity === $entryActivity) {
                    return true;
                }
            }

            $this->context->addViolation($constraint->message);
        }
    }
}
