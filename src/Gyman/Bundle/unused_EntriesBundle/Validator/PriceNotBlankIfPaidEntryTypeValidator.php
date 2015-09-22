<?php
namespace Gyman\Bundle\EntriesBundle\Validator;

use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Symfony\Component\Validator\ExecutionContextInterface;

class PriceNotBlankIfPaidEntryTypeValidator
{
    public static function isPaidAndPriceSet(Entry $entry, ExecutionContextInterface $context)
    {
        if ($entry->getEntryType() == 'paid'
                && trim($entry->getEntryPrice()) == '') {
            $context->addViolationAt('entryPrice', 'Podaj cenę zapłaconą za wejście!');
        }
    }
}
