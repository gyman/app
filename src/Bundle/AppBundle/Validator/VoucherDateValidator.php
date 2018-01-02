<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Validator;

use Gyman\Bundle\AppBundle\Services\Manager\VoucherManager;
use Gyman\Domain\Voucher;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class VoucherDateValidator extends ConstraintValidator
{
    /**
     * @var VoucherManager
     */
    private $voucherManager;

    public function __construct(VoucherManager $voucherManager)
    {
        $this->voucherManager = $voucherManager;
    }

    public function validate($createVoucherCommand, Constraint $constraint)
    {
        /** @var Voucher|null $currentVoucher */
        $currentVoucher = $createVoucherCommand->getMember()->getCurrentVoucher();

        if ($currentVoucher === $createVoucherCommand) {
            return;
        }

        if ($currentVoucher && $currentVoucher->getEndDate() > $createVoucherCommand->getStartDate() && !$currentVoucher->getDeletedAt()) {
            $currentEndDate = $currentVoucher->getEndDate();

            if ($currentEndDate) {
                $properDate = $currentEndDate->format('d.m.Y');
                $this->context->buildViolation('Istnieją już karnety wykupione na ten okres! Ustaw datę początkową conajmniej na ' . $properDate)
                    ->atPath('startDate')
                    ->addViolation();
            }
        }

        if (null !== $createVoucherCommand->getEndDate() && $createVoucherCommand->getStartDate() > $createVoucherCommand->getEndDate()) {
            $this->context->buildViolation('Data końcowa musi być po dacie początkowej!')
                ->atPath('endDate')
                ->addViolation();
        }
    }
}
