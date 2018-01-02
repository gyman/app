<?php

declare(strict_types=1);

namespace Gyman\Bundle\AppBundle\Twig;

use Gyman\Bundle\AppBundle\Services\Manager\MemberManager;
use Gyman\Domain\Member;

class CurrentVoucherProgressbarExtension extends \Twig_Extension
{
    /**
     * @var Gyman\Bundle\AppBundle\Services\Manager\MemberManager
     */
    private $memberManager;

    private $markup_date = '<div class="progress progress-striped">%%start%% - %%end%%
                                    <div style="width: %%percentage%%%;" class="bar"></div>
                                </div>';
    private $markup_entries = '<div class="progress progress-striped">%%amount_used%%/%%amount_total%% %%amount_word%%
                                    <div style="width: %%percentage%%%;" class="bar"></div>
                                </div>';

    /**
     * @return Gyman\Bundle\AppBundle\Services\Manager\MemberManager
     */
    public function getMemberManager()
    {
        return $this->memberManager;
    }

    /**
     * @param \Gyman\Bundle\AppBundle\Services\Manager\MemberManager $memberManager
     *
     * @return \Gyman\Bundle\AppBundle\Twig\CurrentVoucherProgressBarExtension
     */
    public function setMemberManager(MemberManager $memberManager)
    {
        $this->memberManager = $memberManager;

        return $this;
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('progressbar', [$this, 'getProgressBar',
                [
                    'is_safe' => ['html'],
                ], ]),
        ];
    }

    public function getProgressBar(Member $member)
    {
        $voucher = $this->memberManager->getCurrentVoucher($member);

        if (!$voucher) {
            return;
        }

        $params = func_get_args();
        $daysWord = $params[2];

        $result = 'Kod karnetu: <strong>' . $voucher->getBarcode() . '</strong>';

        $startDate = $voucher->getStartDate();
        $endDate = $voucher->getEndDate();

        if (null !== $endDate) {
            $totalDays = $startDate->diff($endDate)->days;
            $leftDays = $endDate->diff(new \DateTime())->days;

            $percentage = (int) (100 - ($leftDays / $totalDays * 100));

            if (1 === $leftDays) {
                $daysWord = $params[1];
            }

            $result .= str_replace([
                '%%percentage%%',
                '%%days_left%%',
                '%%days_word%%',
                '%%start%%',
                '%%end%%',
                    ], [
                $percentage,
                $leftDays,
                $daysWord,
                $startDate->format('d.m'),
                $endDate->format('d.m'),
                    ], $this->markup_date);
        }
        $amountTotal = $voucher->getAmount();

        if (null !== $amountTotal) {
            $amountWord = 'wejść';
            $amountLeft = $voucher->getAmountLeft();

            if (null === $amountLeft) {
                $amountLeft = 0;
            }

            $amountUsed = $amountTotal - $amountLeft;

            $percentageAmount = (int) (100 - ($amountLeft / $amountTotal * 100));

            $result .= str_replace([
                '%%amount_left%%',
                '%%amount_total%%',
                '%%amount_used%%',
                '%%amount_word%%',
                '%%percentage%%',
                    ], [
                $amountLeft,
                $amountTotal,
                $amountUsed,
                $amountWord,
                $percentageAmount,
                    ], $this->markup_entries);
        }

        return $result;
    }

    public function getName()
    {
        return 'current_voucher_progressbar_extension';
    }
}
