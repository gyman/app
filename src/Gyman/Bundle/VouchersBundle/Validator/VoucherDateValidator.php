<?php

namespace Gyman\Bundle\VouchersBundle\Validator;

use Gyman\Bundle\VouchersBundle\Services\Manager\VoucherManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class VoucherDateValidator extends ConstraintValidator
{
    /**
     *
     * @var VoucherManager $voucherManager
     */
    private $voucherManager;

    public function __construct(VoucherManager $voucherManager)
    {
        $this->voucherManager = $voucherManager;
    }

    public function validate($voucher, Constraint $constraint)
    {
        $currentVoucher = $voucher->getMember()->getCurrentVoucher();

        if ($currentVoucher == $voucher) {
            return;
        }

        if ($currentVoucher && $currentVoucher->getEndDate() > $voucher->getStartDate() && !$currentVoucher->getDeletedAt()) {
            $currentEndDate = $currentVoucher->getEndDate();

            if ($currentEndDate) {
                $properDate = $currentEndDate->format('d.m.Y');
                $this->context->addViolationAt('startDate', 'Istnieją już karnety wykupione na ten okres! Ustaw datę początkową conajmniej na ' . $properDate);
            }
        }

        if ($voucher->getEndDate() != null && $voucher->getStartDate() > $voucher->getEndDate()) {
            $this->context->addViolationAt('endDate', 'Data końcowa musi być po dacie początkowej!');
        }
    }
}
