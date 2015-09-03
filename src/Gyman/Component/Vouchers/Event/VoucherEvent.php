<?php
namespace Gyman\Component\Vouchers\Event;

use Gyman\Component\CoreDomain\Event\DomainEventInterface;
use Gyman\Component\CoreDomain\Model\UserInterface;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Model\Voucher;
use Symfony\Component\EventDispatcher\Event;

class VoucherEvent extends Event implements DomainEventInterface
{
    /**
     * @var Voucher
     */
    private $voucher;

    /**
     * @var UserInterface
     */
    private $author;

    /**
     * @var Member
     */
    private $member;

    /**
     * VoucherEvent constructor.
     * @param Member $member
     * @param Voucher $voucher
     * @param UserInterface $author |null
     */
    public function __construct(Member $member, Voucher $voucher, $author = null)
    {
        $this->member = $member;
        $this->voucher = $voucher;
        $this->author = $author;
    }
}
