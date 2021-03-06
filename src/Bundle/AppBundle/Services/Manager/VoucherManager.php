<?php
namespace Gyman\Bundle\AppBundle\Services\Manager;

use Doctrine\ORM\QueryBuilder;
use Exception;
use Gyman\Domain\Member;
use Gyman\Domain\Voucher;
use Gyman\Bundle\AppBundle\Event\VoucherCreatedEvent;
use Gyman\Bundle\AppBundle\Event\VoucherEditedEvent;
use Gyman\Bundle\AppBundle\VouchersEvents;
use Gyman\Bundle\BaseBundle\EntityManager\BaseManager;

/**
 * @todo: refactor class and move to entitymanagers
 * Manages Vouchers
 * @method VouchersRepository getRepository() getRepo() Returns entity memberRepository
 */
class VoucherManager extends BaseManager
{
    public function save($object, $withFlush = true)
    {
        $isNew = !$object->getId() ? true : false;

        parent::save($object, $withFlush);

        if ($isNew) {
            $this->dispatcher->dispatch(VouchersEvents::CREATED, new VoucherCreatedEvent($object));
        } else {
            $this->dispatcher->dispatch(VouchersEvents::EDITED, new VoucherEditedEvent($object));
        }
    }

    /**
     * Returns array of all members
     * @return array
     */
    public function getMembers()
    {
        $query = $this->getRepository()->getQuery();
        $this->setActiveCriteria($query);

        return $query->getQuery()->execute();
    }

    /**
     * Returns member by id
     * @param  int    $id
     * @return Member
     */
    public function getById($id)
    {
        return $this->getRepository()->find($id);
    }

    public function setAsDeleted($id)
    {
        $member = $this->getById($id);

        if (!$member) {
            throw new Exception('Voucher not found');
        }

        $member->setDeletedAt(new \DateTime());
        $this->persist($member);
        $this->flush($member);
    }

    /**
     * @param QueryBuilder $query
     */
    public function setActiveCriteria(QueryBuilder $query)
    {
        $query->andWhere('v.deletedAt is null');
    }

    public function closeVoucher(Voucher $voucher)
    {
        $yesterday = date('Y-m-d 23:59:59', strtotime('yesterday'));
        $voucher->setEndDate(new \DateTime($yesterday));
        $this->save($voucher);
    }

    /**
     *
     * @param  Member  $member
     * @return Voucher
     */
    public function createNewVoucherNow(Member $member)
    {
        return $this->createNewVoucher($member, false);
    }

    /**
     *
     * @param  Member  $member
     * @return Voucher
     */
    public function createNewVoucherAtEndDate(Member $member)
    {
        return $this->createNewVoucher($member, true);
    }

    /**
     *
     * @param  \Gyman\Domain\Member   $member
     * @param  bool                                        $usePreviousEndDate
     * @return \Gyman\Domain\Voucher
     */
    public function createNewVoucher(Member $member, $usePreviousEndDate = false)
    {
        $currentVoucher = $member->getCurrentVoucher();

        $voucher = new Voucher();
        $startDate = new \DateTime();
        if ($currentVoucher) {
            $startDate = clone($currentVoucher->getEndDate());
            $startDate->add(new \DateInterval('PT1S'));
        }

        $endDate = clone($startDate);
        $endDate->add(new \DateInterval('P1M'));

        $voucher->setMember($member);
        $voucher->setStartDate($startDate);
        $voucher->setEndDate($endDate);
        $voucher->setPrice(150);
        $voucher->setAmount(null);

        return $voucher;
    }
}
