<?php

namespace Gyman\Bundle\EntriesBundle\Validator;

//use Symfony\Component\Validator\ConstraintValidator;
//use Symfony\Component\Validator\Constraint;
//use Gyman\Bundle\VouchersBundle\Entity\Voucher;
//use Gyman\Bundle\MembersBundle\Entity\Member;
//use Gyman\Bundle\VouchersBundle\Services\Manager\VoucherManager;
use Symfony\Component\Validator\ExecutionContextInterface;
use Gyman\Bundle\EntriesBundle\Entity\Entry;

// extends ConstraintValidator

class LeftAmountValidator
{
    public static function isAmountLeft(Entry $entry, ExecutionContextInterface $context)
    {
        if ($entry->getEntryType() == "voucher"
                && $entry->getVoucher()
                && $entry->getVoucher()->getAmount() !== null // getAmount == null oznacza, że karnet jest open!
                && $entry->getVoucher()->getAmountLeft() == 0) {
            $context->addViolation("Użytkownik wykorzystał już wszystkie wejścia z posiadanego karnetu!");
        }
    }
}
