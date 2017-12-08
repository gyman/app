<?php
namespace Gyman\Bundle\AppBundle\Services;

use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\Entry;
use Gyman\Bundle\AppBundle\Repository\EntryRepository;
use Gyman\Domain\Member;

class RemoveEntryFromOccurrence
{
    /**
     * @var EntryRepository
     */
    private $entryRepository;

    /**
     * RemoveEntryFromOccurrence constructor.
     * @param EntryRepository $entryRepository
     */
    public function __construct(EntryRepository $entryRepository)
    {
        $this->entryRepository = $entryRepository;
    }

    /**
     * @param Member $member
     * @param Occurrence $occurrence
     */
    public function remove(Member $member, Occurrence $occurrence)
    {
        $entries = $this->entryRepository->findByOccurrence($occurrence);

        $entry = array_filter($entries, function (Entry $entry) use ($member) {
            return $entry->member()->id() === $member->id();
        });

        /** @var Entry $entry */
        $entry = array_pop($entry);

        if ($entry->isType(Entry::TYPE_VOUCHER)) {
            $voucher = $entry->voucher();
            $voucher->removeEntry($entry);
        }

        $member->removeEntry($entry);

        $this->entryRepository->remove($entry);
    }
}
