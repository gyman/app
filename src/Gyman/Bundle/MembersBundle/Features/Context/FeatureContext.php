<?php

namespace Gyman\Bundle\MembersBundle\Features\Context;

use Behat\Behat\Context\Step\Then;
use Behat\Behat\Context\Step\When;
use Behat\Mink\Exception\ElementNotFoundException;
use Behat\Mink\Exception\ResponseTextException;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Symfony\Component\HttpKernel\KernelInterface;

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
     * @When /^(?:|I )click element "([^"]*)"$/
     */
    public function iClickElement($locator)
    {
        $element = $this->getSession()
                ->getPage()
                ->find('css', $locator);

        if ($element == null) {
            throw new ElementNotFoundException($this->getSession(), 'element', 'css', $locator);
        }

        $element->click();
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
                ->find('css', $selector);

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
}
