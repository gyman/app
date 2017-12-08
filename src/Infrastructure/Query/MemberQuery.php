<?php
namespace Gyman\Infrastructure\Query;

use DateTime;
use Doctrine\DBAL\Connection;
use Gyman\Application\Query\MemberQueryInterface;
use Gyman\Domain\Calendar\Event\Occurrence;
use Gyman\Domain\MemberView;
use Gyman\Infrastructure\Table;

class MemberQuery implements MemberQueryInterface
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

    public function findAll() : array
    {
        $memberTable = Table::MEMBER;
        $voucherTable = Table::VOUCHER;
        $entriesTable = Table::ENTRY;

        $result = $this->connection->fetchAll(<<<SQL
SELECT DISTINCT m.id,
  m.firstname,
  m.lastname,
  m.foto,
  m.last_entry_id,
  m.current_voucher_id,
  v.endDate as voucher_end_date,
  (v.maximumAmount - COUNT(e.id)) as voucher_left_amount
FROM
  $memberTable m, $voucherTable v, $entriesTable e
WHERE
  m.deletedAt IS NULL
  AND m.current_voucher_id = v.id
  AND e.voucher_id = m.current_voucher_id
GROUP BY m.id, e.id, v.id
ORDER BY
  m.last_entry_id ASC, m.current_voucher_id DESC, m.lastname ASC
SQL
);

        return array_map(function(array $member){
            return new MemberView(
                $member['id'],
                $member['lastname'],
                $member['firstname'],
                $member['foto'],
                $member['last_entry_id'],
                $member['current_voucher_id'],
                $member['voucher_end_date']? new DateTime($member['voucher_end_date']) : null,
                $member['voucher_left_amount']
            );
        }, $result);
    }

    public function findWithVoucher() : array
    {
        $result = $this->connection->fetchAll(sprintf(
            'SELECT m.id, m.firstname, m.lastname, m.foto, m.last_entry_id, m.current_voucher_id FROM %s m WHERE deletedAt IS NULL AND current_voucher_id IS NOT NULL ORDER BY m.lastname ASC',
            Table::MEMBER));

        return array_map(function(array $member){
            return new MemberView(
                $member['id'],
                $member['lastname'],
                $member['firstname'],
                $member['foto'],
                $member['last_entry_id'],
                $member['current_voucher_id']
            );
        }, $result);
    }

    public function findMembersThatEntered(Occurrence $occurrence) : array
    {
        $result = $this->connection->fetchAll('
SELECT m.id,
 m.firstname,
 m.lastname,
 m.foto,
 m.last_entry_id,
 m.current_voucher_id 
FROM members as m, entries as e
WHERE m.deletedAt IS NULL
AND m.id = e.member_id
AND e.occurrence_id = :occurrence_id
ORDER BY m.lastname ASC', [
    ":occurrence_id" => $occurrence->id()->toString()
        ]);
        
        return array_map(function(array $member){
            return new MemberView(
                $member['id'],
                $member['lastname'],
                $member['firstname'],
                $member['foto'],
                $member['last_entry_id'],
                $member['current_voucher_id']
            );
        }, $result);
    }
}