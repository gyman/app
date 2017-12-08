<?php
namespace Gyman\Bundle\AppBundle\Validator;

use Doctrine\Common\Collections\ArrayCollection;
use Gyman\Domain\Entry;
use Gyman\Bundle\AppBundle\Services\Manager\VoucherManager;
use Gyman\Application\Command\CreateVoucherCommand;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class MaximumAmountGreaterThanCreditEntriesValidator extends ConstraintValidator
{
    /**
     * @param CreateVoucherCommand $createVoucherCommand
     * @param Constraint $constraint
     */
    public function validate($createVoucherCommand, Constraint $constraint)
    {
        /** @var ArrayCollection $creditEntries */
        $creditEntries = $createVoucherCommand->member->filterCreditEntries();

        $creditEntriesCount = $creditEntries->count();

        if ($createVoucherCommand->maximumAmount <= $creditEntriesCount) {
            $this->context->addViolationAt('maximumAmount', sprintf(
                'Użytkownik posiada %d wejścia kredytowe, które automatycznie zostaną odjęte z karnetu. Musisz ustawić przynajmniej %d wejścia',
                $creditEntriesCount,
                $creditEntriesCount + 1
            ));
        }
    }
}
