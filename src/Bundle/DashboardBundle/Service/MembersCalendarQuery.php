<?php

declare(strict_types=1);

namespace Gyman\Bundle\DashboardBundle\Service;

use DateTime;
use Dende\Calendar\Domain\Calendar\Event\OccurrenceInterface;
use Gyman\Domain\Entry;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;

class MembersCalendarQuery
{
    public function get(Member $member, DateTime $start, DateTime $end): array
    {
        $vouchers = $member->vouchers()->map(function (Voucher $voucher) {
            return $this->convertVoucher($voucher);
        });

        $entries = $member->entries()->filter(function (Entry $entry) use ($start, $end) {
            return $entry->startDate() >= $start && $entry->endDate() <= $end;
        })->map(function (Entry $entry) {
            return $this->convertOccurrence($entry->occurrence());
        });

        return array_merge($entries->toArray(), $vouchers->toArray());
    }

    private function convertVoucher(Voucher $voucher): array
    {
        $options = [
            'title'           => sprintf('Karnet %s-%s', $voucher->startDate()->format('d.m'), $voucher->endDate()->format('d.m')),
            'start'           => $voucher->startDate()->format('Y-m-d H:i:s'),
            'end'             => $voucher->endDate()->format('Y-m-d H:i:s'),
            'backgroundColor' => '#ddddff',
            'textColor'       => 'black',
            'editable'        => false,
            'allDay'          => true,
        ];

        return $options;
    }

    private function convertOccurrence(OccurrenceInterface $occurrence): array
    {
        $options = [
            'title'           => $occurrence->event()->title(),
            'start'           => $occurrence->startDate()->format('Y-m-d H:i:s'),
            'end'             => $occurrence->endDate()->format('Y-m-d H:i:s'),
            'backgroundColor' => '#ffdddd',
            'textColor'       => 'black',
            'editable'        => false,
        ];

        return $options;
    }
}
