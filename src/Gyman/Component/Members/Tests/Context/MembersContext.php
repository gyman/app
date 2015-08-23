<?php

namespace Gyman\Component\Members\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Exception;
use Gyman\Component\CoreDomain\Repository\InMemoryDomainEventRepository;
use Gyman\Component\CoreDomain\Tests\LoggedAsAdministratorTrait;
use Gyman\Component\Members\Event\MemberEvent;
use Gyman\Component\Members\Factory\MemberFactory;
use Gyman\Component\Members\Repository\InMemoryMemberRepository;
use Gyman\Component\Members\Service\CreateMember;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MembersContext implements Context
{
    use LoggedAsAdministratorTrait;

    /**
     * @var InMemoryMemberRepository
     */
    private $memberRepository;

    /**
     * @var
     */
    private $lastNotification;

    /**
     * @var CreateMember
     */
    private $createMember;

    /**
     * @var InMemoryDomainEventRepository
     */
    private $domainEventRepository;

    /**
     * @BeforeScenario
     */
    public function prepareUseCases()
    {
        $dispatcher = new EventDispatcher();

        $this->memberRepository = new InMemoryMemberRepository();
        $this->domainEventRepository = new InMemoryDomainEventRepository();

        $this->createMember = new CreateMember($this->memberRepository, $dispatcher);

        $dispatcher->addListener(CreateMember::SUCCESS, [$this, 'recordNotification']);
        $dispatcher->addListener(CreateMember::FAILURE, [$this, 'recordNotification']);
    }

    /**
     * @Given /^there is no members$/
     * @Then /^I have (\d+) user in repository$/
     */
    public function thereIsMembersCount($amount = 0)
    {
        $members = $this->memberRepository->findAll();

        $count = count($members);

        if ($count != (int) $amount) {
            throw new Exception(sprintf('Expected amount of members: %d, actually: %d', $amount, $count));
        }
    }

    /**
     * @When /^I add new member with data:$/
     * @param TableNode $table
     */
    public function iAddNewMemberWithData(TableNode $table)
    {
        $member = MemberFactory::createFromArray([
            'firstname' => $table->getColumn(0)[1],
            'lastname'  => $table->getColumn(1)[1],
            'email'     => $table->getColumn(2)[1],
        ]);

        $this->createMember->createMember($member, $this->user);
    }

    /**
     * @Given /^I should be notified about the member project creation success$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationSuccess()
    {
        if ($this->lastNotification !== CreateMember::SUCCESS) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @param Event $event
     */
    public function recordNotification(Event $event)
    {
        $this->lastNotification = $event->getName();

        if ($event->getName() === CreateMember::SUCCESS) {
            $this->domainEventRepository->insert($event);
        }
    }

    /**
     * @When /^I add new member without any data$/
     */
    public function iAddNewMemberWithoutAnyData()
    {
        $member = MemberFactory::createFromArray([]);

        $this->createMember->createMember($member, $this->user);
    }

    /**
     * @Given /^I should be notified about the member project creation failure$/
     */
    public function iShouldBeNotifiedAboutTheMemberProjectCreationFailure()
    {
        if ($this->lastNotification !== CreateMember::FAILURE) {
            throw new Exception('No success event thrown');
        }
    }

    /**
     * @Given /^domain event on success is stored in repository$/
     */
    public function domainEventOnSuccessIsStoredInRepository()
    {
        $events = $this->domainEventRepository->findAll();
        $event = array_pop($events);

        if (is_null($event) || !$event instanceof MemberEvent || $event->getName() !== CreateMember::SUCCESS) {
            throw new Exception('Last stored event is incorrect');
        }
    }

    /**
     * @Given /^domain event on failure is not stored in repository$/
     */
    public function domainEventOnFailureIsNotStoredInRepository()
    {
        $events = $this->domainEventRepository->findAll();
        $event = array_pop($events);

        if (!is_null($event) && $event instanceof MemberEvent && $event->getName() === CreateMember::FAILURE) {
            throw new Exception('Last stored event is incorrect');
        }
    }
}
