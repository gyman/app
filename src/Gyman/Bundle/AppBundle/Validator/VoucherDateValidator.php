<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Bundle\AppBundle\Services\Manager\VoucherManager;
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

    public function validate($createVoucherCommand, Constraint $constraint)
    {
        $currentVoucher = $createVoucherCommand->getMember()->getCurrentVoucher();

        if ($currentVoucher == $createVoucherCommand) {
            return;
        }

        if ($currentVoucher && $currentVoucher->getEndDate() > $createVoucherCommand->getStartDate() && !$currentVoucher->getDeletedAt()) {
            $currentEndDate = $currentVoucher->getEndDate();

            if ($currentEndDate) {
                $properDate = $currentEndDate->format('d.m.Y');
                $this->context->addViolationAt('startDate', 'Istnieją już karnety wykupione na ten okres! Ustaw datę początkową conajmniej na ' . $properDate);
            }
        }

        if ($createVoucherCommand->getEndDate() != null && $createVoucherCommand->getStartDate() > $createVoucherCommand->getEndDate()) {
            $this->context->addViolationAt('endDate', 'Data końcowa musi być po dacie początkowej!');
        }
    }
}
