<?php

namespace Gyman\Bundle\ScheduleBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\Step\Then;
use Behat\Behat\Context\Step\When;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Exception\ResponseTextException;

class FeatureContext extends MinkContext implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Then /^I will wait to see modal "([^"]*)"$/
     */
    public function iWillWaitToSeeModal($title)
    {
        $element = $this->getSession()
            ->getPage()
            ->find("css", "div#modalWindow");

        $tick = 250000;
        $timeout = time() + 10;

        $text = $this->fixStepArgument($title);
        $regex = '/' . preg_quote($text, '/') . '/ui';

        while (time() < $timeout) {
            usleep($tick);

            $actual = preg_replace('/\s+/u', ' ', $element->getText());

            if (preg_match($regex, $actual)) {
                $this->getScreen();

                return;
            }
        }

        $this->getScreen();
        $message = sprintf('Modal with title "%s" was not found', $text);
        throw new ResponseTextException($message, $this->getSession());
    }

    /**
     * @When /^(?:|I )click element "([^"]*)"$/
     */
    public function iClickElement($locator)
    {
        $element = $this->getSession()
            ->getPage()
            ->find("css", $locator);

        if ($element == null) {
            throw new ElementNotFoundException($this->getSession(), 'element', 'css', $locator);
        }

        $element->click();
    }

    /**
     * @When /^I open activity selector$/
     */
    public function iOpenActivitySelector()
    {
        $page = $this->getSession()->getScreenshot();

        file_put_contents("/tmp/screen.png", $page);
    }

    /**
     * @When /^(?:|I )choose select2 option "([^"]*)"$/
     */
    public function chooseSelect2Option($name)
    {
        /** @var Behat\Mink\Element\NodeElement $drop */
        $drop = $this->getSession()
            ->getPage()
            ->find("css", "div#select2-drop");

        if (!is_object($drop)) {
            throw new ElementNotFoundException($this->getSession(), 'element');
        }

        $options = $drop->findAll("css", "div.select2-result-label");

        /** @var Behat\Mink\Element\NodeElement $element */
        $element = null;

        foreach ($options as $option) {
            if ($option->getText() == $name) {
                $element = $option;
            }
        }

        if ($element == null) {
            throw new ElementNotFoundException($this->getSession(), 'element', 'text', $name);
        }

        $element->press();
    }

    /**
     * @Given /^I fill element "([^"]*)" with datetime "([^"]*)"$/
     */
    public function iFillElementWithDatetime($selector, $date)
    {
        $element = $this->getSession()
            ->getPage()
            ->find("css", $selector);

        $newDate = new \DateTime($date);

        $element->setValue($newDate->format("d.m.Y H:i"));
    }

    /**
     * @Given /^I fill element "([^"]*)" with "([^"]*)"$/
     */
    public function iFillElementWith($selector, $value)
    {
        $element = $this->getSession()
            ->getPage()
            ->find("css", $selector);

        $element->setValue($value);
    }

    /**
     * @When /^(?:|I )will wait to see "(?P<text>(?:[^"]|\\")*)"$/
     * @Then /^(?:|I )should see "(?P<text>(?:[^"]|\\")*)" after time$/
     */
    public function iWaitToSee($text, $maxWait = 5)
    {
        $tick = 250000;
        $timeout = time() + $maxWait;

        $text = $this->fixStepArgument($text);

        $regex = '/' . preg_quote($text, '/') . '/ui';

        while (time() < $timeout) {
            usleep($tick);

            $actual = $this->getSession()->getPage()->getText();
            $actual = preg_replace('/\s+/u', ' ', $actual);

            if (preg_match($regex, $actual)) {
                return;
            }
        }

        $message = sprintf('The text "%s" was not found anywhere in the text of the current page.', $text);
        throw new ResponseTextException($message, $this->getSession());
    }

    /**
     * @Then /^I will wait to see element "([^"]*)" with "(?P<text>(?:[^"]|\\")*)" text$/
     */
    public function iWillWaitToSeeElementWithText($selector, $text)
    {
        /** @var Behat\Mink\Element\NodeElement $element */
        $element = $this->getSession()
            ->getPage()
            ->find("css", $selector);

        if ($element) {
            $tick = 250000;
            $timeout = time() + 5;
            $text = $this->fixStepArgument($text);
            $regex = '/' . preg_quote($text, '/') . '/ui';

            while (time() < $timeout) {
                usleep($tick);

                $actual = preg_replace('/\s+/u', ' ', $element->getText());

                if (preg_match($regex, $actual)) {
                    return;
                }
            }
        }

        $message = sprintf('The element "%s" with text "%s" was not found anywhere in the text of the current page.', $selector, $text);
        throw new ResponseTextException($message, $this->getSession());
    }

    /**
     * @Given /^I wait for (\d+) seconds$/
     */
    public function iWaitForSeconds($seconds)
    {
        for ($a = 0; $a < $seconds; $a++) {
            sleep(1);
        }

        return;
    }

    private function getScreen()
    {
        $page = $this->getSession()->getScreenshot();
        file_put_contents("/tmp/screen".time().".png", $page);
    }
}
