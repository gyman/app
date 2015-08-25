<?php
namespace Gyman\Component\Vouchers\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\TableNode;
use DateTime;
use Exception;
use Gyman\Component\CoreDomain\Repository\InMemoryDomainEventRepository;
use Gyman\Component\CoreDomain\Tests\LoggedAsAdministratorTrait;
use Gyman\Component\Members\Model\Member;
use Gyman\Component\Vouchers\Factory\VoucherFactory;
use Gyman\Component\Vouchers\Model\Voucher;
use Gyman\Component\Vouchers\Repository\InMemoryVoucherRepository;
use Gyman\Component\Vouchers\Service\SellVoucher;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class VouchersContext
 * @package Gyman\Component\Vouchers
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
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function prepareUseCases(BeforeScenarioScope $scope)
    {
        $dispatcher = new EventDispatcher();

        $this->voucherRepository = new InMemoryVoucherRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->sellVoucher = new SellVoucher($this->voucherRepository, $dispatcher);

        $dispatcher->addListener(SellVoucher::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(SellVoucher::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @Given /^I get notification about successful voucher creation\.$/
     */
    public function iGetNotificationAboutSuccessfulVoucherCreation()
    {
        if ($this->lastNotification !== SellVoucher::SUCCESS) {
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

        if ($event->getName() === SellVoucher::SUCCESS) {
            $this->domainEventRepository->insert($event);
        }
    }

    /**
     * @Given /^his previous voucher is closed with \'([^\']*)\' equals to date \'([^\']*)\'$/
     */
    public function hisPreviousVoucherIsClosedWithEqualsToDate($field, $date)
    {
        $closingDate = new DateTime($date);
        $vouchers = $this->member->vouchers();

        /** @var Voucher $previousVoucher */
        $previousVoucher = $vouchers->get($vouchers->count() - 2);
        /** @var DateTime $endDate */
        $endDate = $previousVoucher->$field();

        if ($endDate->getTimestamp() != $closingDate->getTimestamp()) {
            throw new Exception(sprintf(
                'Dates are not equal. Expected %s actually is %s',
                $endDate->format('Y-m-d H:i:s'),
                $closingDate->format('Y-m-d H:i:s')
                )
            );
        }
    }
}