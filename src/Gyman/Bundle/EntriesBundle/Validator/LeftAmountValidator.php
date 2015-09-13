<?php
namespace Gyman\Bundle\EntriesBundle\Validator;

//use Symfony\Component\Validator\ConstraintValidator;
//use Symfony\Component\Validator\Constraint;
//use Gyman\Bundle\VouchersBundle\Entity\Voucher;
//use Gyman\Bundle\MembersBundle\Entity\Member;
//use Gyman\Bundle\VouchersBundle\Services\Manager\VoucherManager;
//use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\VouchersBundle\Entity\Entry;
use Symfony\Component\Validator\ExecutionContextInterface;

// extends ConstraintValidator

class LeftAmountValidator
{
    public static function isAmountLeft(Entry $entry, ExecutionContextInterface $context)
    {
        if ($entry->isType(Entry::TYPE_VOUCHER) && $entry->voucher()->leftEntriesAmount() === 0) {
            $context->addViolation('Użytkownik wykorzystał już wszystkie wejścia z posiadanego karnetu!');
        }
    }
}
