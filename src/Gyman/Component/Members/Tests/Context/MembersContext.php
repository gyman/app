<?php

namespace Gyman\Component\Members\Tests\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;

class MembersContext implements Context {

    /**
     * @Given /^there is no members$/
     */
    public function thereIsNoMembers()
    {
        throw new PendingException();
    }

    /**
     * @When /^I add new member with data:$/
     * @param TableNode $table
     */
    public function iAddNewMemberWithData(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I have (\d+) user in repository$/
     */
    public function iHaveUserInRepository($arg1)
    {
        throw new PendingException();
    }
}