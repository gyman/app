<?php
namespace Gyman\Domain\Event;

use Gyman\Domain\Model\Member;
use Gyman\Domain\Model\UserInterface;
use Gyman\Domain\Model\Voucher;
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
     * VoucherEvent constructor.
     * @param Member $member
     * @param Voucher $voucher
     * @param UserInterface $author |null
     */
    public function __construct(Voucher $voucher, $author = null)
    {
        $this->voucher = $voucher;
        $this->author = $author;
    }
}
