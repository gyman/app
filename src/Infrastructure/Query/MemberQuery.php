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
  v.startDate as voucher_start_date,
  v.endDate as voucher_end_date,
  (v.maximumAmount - COUNT(e.id)) as voucher_left_amount,
  m.barcode
FROM
  $memberTable m
LEFT JOIN $voucherTable v ON m.current_voucher_id = v.id
LEFT JOIN $entriesTable e ON m.current_voucher_id = e.voucher_id
WHERE
  m.deletedAt IS NULL
  AND m.current_voucher_id IS NOT NULL
  AND m.last_entry_id IS NULL
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
                $member['voucher_start_date']? new DateTime($member['voucher_start_date']) : null,
                $member['voucher_end_date']? new DateTime($member['voucher_end_date']) : null,
                $member['voucher_left_amount'],
                $member['barcode']
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
        $memberTable = Table::MEMBER;
        $voucherTable = Table::VOUCHER;
        $entriesTable = Table::ENTRY;

        $result = $this->connection->fetchAll(<<<SQL
SELECT 
    m.id,
    m.firstname,
    m.lastname,
    m.foto,
    m.last_entry_id,
    m.current_voucher_id,
    m.current_voucher_id,
    v.startDate as voucher_start_date,
    v.endDate as voucher_end_date,
    (v.maximumAmount - COUNT(e.id)) as voucher_left_amount,
    m.barcode
FROM
  $memberTable m
  LEFT JOIN $voucherTable v ON m.current_voucher_id = v.id
  LEFT JOIN $entriesTable e ON m.id = e.member_id
WHERE
  m.deletedAt IS NULL
  AND e.occurrence_id = :occurrence_id
GROUP BY m.id, e.id
ORDER BY 
  e.startDate ASC
SQL
, [":occurrence_id" => $occurrence->id()->toString()]);
        
        return array_map(function(array $member){
            return new MemberView(
                $member['id'],
                $member['lastname'],
                $member['firstname'],
                $member['foto'],
                $member['last_entry_id'],
                $member['current_voucher_id'],
                $member['voucher_start_date']? new DateTime($member['voucher_start_date']) : null,
                $member['voucher_end_date']? new DateTime($member['voucher_end_date']) : null,
                $member['voucher_left_amount'],
                $member['barcode']
            );
        }, $result);
    }
}