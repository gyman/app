<?php
namespace Gyman\Infrastructure\Query;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Connection;
use Gyman\Application\Query\EntryQueryInterface;
use Gyman\Domain\Entry\Price;
use Gyman\Domain\Entry\Type;
use Gyman\Domain\Member;
use Gyman\Infrastructure\Table;
use Gyman\Model\View\EntryView;
use Gyman\Model\View\EventView;
use Gyman\Model\View\SectionView;
use Ramsey\Uuid\Uuid;

class EntryQuery implements EntryQueryInterface
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * MemberView constructor.
     * @param $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param Member $member
     * @param int $limit
     * @return Collection|ArrayCollection
     */
    public function findLastByMember(Member $member, int $limit): Collection
    {
        $entriesTable = Table::ENTRY;
        $sectionsTable = Table::SECTION;
        $eventsTable = Table::EVENT;
        $occurrenceTable = Table::OCCURRENCE;

        $memberId = $member->id()->toString();
        $result = $this->connection->fetchAll(
<<<SQL
SELECT e.id as entry_id, 
    e.startDate as start_date,
    e.type as entry_type,
    e.price_amount as price_amount,
    e.price_currency as price_currency,
    ev.id as event_id,
    ev.title as event_title,
    s.id as section_id,
    s.title as section_title 
FROM $entriesTable e, $sectionsTable s, $eventsTable ev, $occurrenceTable o
WHERE
    e.member_id = '$memberId'
    AND e.occurrence_id = o.id
    AND o.event_id = ev.id
    AND ev.calendar_id = s.calendar_id
    AND e.deletedAt IS NULL
ORDER BY start_date DESC
LIMIT $limit
SQL
);

        return new ArrayCollection(array_map(function(array $entry){
            return new EntryView(
                Uuid::fromString($entry['entry_id']),
                new DateTime($entry['start_date']),
                array_key_exists('end_date', $entry) ? new DateTime($entry['end_date']) : null,
                new EventView(Uuid::fromString($entry['event_id']), $entry['event_title']),
                new SectionView(Uuid::fromString($entry['section_id']), $entry['section_title']),
                new Type($entry['entry_type']),
                $entry['entry_type'] === Type::TYPE_PAID ? new Price($entry['price_amount'], $entry['price_currency']) : null
            );
        }, $result));
    }

    public function findByDates(Member $member, DateTime $startDate, DateTime $endDate) : Collection
    {
        $entriesTable = Table::ENTRY;
        $sectionsTable = Table::SECTION;
        $eventsTable = Table::EVENT;
        $occurrenceTable = Table::OCCURRENCE;

        $memberId = $member->id()->toString();

        $startDate = $startDate->format("Y-m-d H:i:s");
        $endDate = $endDate->format("Y-m-d H:i:s");

        $result = $this->connection->fetchAll(
            <<<SQL
SELECT e.id as entry_id, 
    e.startDate as start_date,
    e.endDate as end_date,
    e.type as entry_type,
    e.price_amount as price_amount,
    e.price_currency as price_currency,
    ev.id as event_id,
    ev.title as event_title,
    s.id as section_id,
    s.title as section_title 
FROM $entriesTable e, $sectionsTable s, $eventsTable ev, $occurrenceTable o
WHERE
    e.member_id = '$memberId'
    AND e.occurrence_id = o.id
    AND o.event_id = ev.id
    AND ev.calendar_id = s.calendar_id
    AND e.deletedAt IS NULL
    AND e.startDate BETWEEN '$startDate' AND '$endDate'
ORDER BY start_date DESC
SQL
        );

        return new ArrayCollection(array_map(function(array $entry){
            return new EntryView(
                Uuid::fromString($entry['entry_id']),
                new DateTime($entry['start_date']),
                array_key_exists('end_date', $entry) ? new DateTime($entry['end_date']) : null,
                new EventView(Uuid::fromString($entry['event_id']), $entry['event_title']),
                new SectionView(Uuid::fromString($entry['section_id']), $entry['section_title']),
                new Type($entry['entry_type']),
                $entry['entry_type'] === Type::TYPE_PAID ? new Price($entry['price_amount'], $entry['price_currency']) : null
            );
        }, $result));
    }
}