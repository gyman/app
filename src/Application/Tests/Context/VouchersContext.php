<?php

declare(strict_types=1);

namespace Gyman\Application\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use DateTime;
use Exception;
use Gyman\Application\Factory\VoucherFactory;
use Gyman\Application\Member;
use Gyman\Application\Repository\InMemoryDomainEventRepository;
use Gyman\Application\Repository\InMemoryMemberRepository;
use Gyman\Application\Repository\InMemoryVoucherRepository;
use Gyman\Application\Service\SellVoucher;
use Gyman\Domain\Voucher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class VouchersContext.
 *
 * @property Member $member
 */
class VouchersContext implements Context
{
    use LoggedAsAdministratorTrait;
    use HeHasVouchersTrait;
    use MemberExistsTrait;

    /**
     * @var InMemoryVoucherRepository
     */
    private $voucherRepository;

    /**
     * @var Event
     */
    private $lastNotification;

    /**
     * @var SellVoucher
     */
    private $sellVoucher;

    /**
     * @var InMemoryDomainEventRepository
     */
    private $domainEventRepository;

    /**
     * @var Member
     */
    private $member;

    /**
     * @var InMemoryMemberRepository
     */
    private $memberRepository;

    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function prepareUseCases(BeforeScenarioScope $scope)
    {
        $dispatcher = new EventDispatcher();

        $this->voucherRepository = new InMemoryVoucherRepository();
        $this->memberRepository = new InMemoryMemberRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->sellVoucher = new SellVoucher($this->memberRepository, $dispatcher);

        $dispatcher->addListener(SellVoucher::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(SellVoucher::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @Given /^I get notification about successful voucher creation\.$/
     */
    public function iGetNotificationAboutSuccessfulVoucherCreation()
    {
        if (SellVoucher::SUCCESS !== $this->lastNotification) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @Then /^I sell voucher to him with data$/
     */
    public function iSellVoucherToHimWithData(TableNode $table)
    {
        foreach ($table as $row) {
            list($startDate, $endDate, $price, $maximalAmount) = array_values($row);

            list($amount, $currency) = sscanf($price, '%d %s');

            $voucher = VoucherFactory::createFromArray([
                'startDate'     => $startDate,
                'endDate'       => $endDate,
                'price'         => ['amount' => $amount, 'currency' => $currency],
                'maximumAmount' => $maximalAmount,
            ]);

            $this->sellVoucher->sellVoucher($this->member, $voucher, $this->user);
        }
    }

    /**
     * @param Event $event
     */
    public function recordNotification(Event $event)
    {
        $this->lastNotification = $event->getName();

        if (SellVoucher::SUCCESS === $event->getName()) {
            $this->domainEventRepository->insert($event);
        }
    }

    /**
     * @Given /^his previous voucher is closed with \'([^\']*)\' equals to date \'([^\']*)\'$/
     *
     * @param mixed $field
     * @param mixed $date
     */
    public function hisPreviousVoucherIsClosedWithEqualsToDate($field, $date)
    {
        $closingDate = new DateTime($date);
        $vouchers = $this->member->vouchers();

        /** @var Voucher $previousVoucher */
        $previousVoucher = $vouchers->get($vouchers->count() - 2);
        /** @var DateTime $endDate */
        $endDate = $previousVoucher->$field();

        if ($endDate->getTimestamp() !== $closingDate->getTimestamp()) {
            throw new Exception(sprintf(
                'Dates are not equal. Expected %s actually is %s',
                $endDate->format('Y-m-d H:i:s'),
                $closingDate->format('Y-m-d H:i:s')
                )
            );
        }
    }

    /**
     * @Given /^first voucher is his currentVoucher$/
     */
    public function firstVoucherIsHisCurrentVoucher()
    {
        if ($this->member->currentVoucher() !== $this->member->vouchers()->first()) {
            throw new Exception('Current voucher is different the first one!');
        }
    }
}
