<?php
namespace Gyman\Infrastructure\Query;

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
        $result = $this->connection->fetchAll(sprintf(
            'SELECT m.id, m.firstname, m.lastname, m.foto, m.last_entry_id, m.current_voucher_id FROM %s m WHERE deletedAt IS NULL ORDER BY m.lastname ASC',
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