<?php
namespace Tests;

use Doctrine\Common\DataFixtures\ProxyReferenceRepository;
use Exception;
use Gyman\Bundle\AppBundle\DataFixtures\Club\ORM\CalendarsData;
use Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\ClubsData;
use Gyman\Bundle\ClubBundle\DataFixtures\StandardConnection\ORM\UsersData;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;
use Symfony\Component\HttpFoundation\Response;

class FunctionalTestCase extends WebTestCase
{
    /** @var ProxyReferenceRepository  */
    protected $defaultFixtures;

    /** @var ProxyReferenceRepository  */
    protected $tenantFixtures;

    /** @var  Client */
    protected $client;

    public function setUp()
    {
        $this->tenantFixtures = $this->loadFixtures([
            UsersData::class,
            ClubsData::class
        ], "default")->getReferenceRepository();

        $this->tenantFixtures = $this->loadFixtures([
            CalendarsData::class
        ], "tenant")->getReferenceRepository();
    }

    /**
     * @return Client
     */
    public function client()
    {
        return $this->client;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array  $parameters
     *
     * @return Crawler
     */
    protected function request($method, $uri, array $parameters = array(), array $server = [])
    {
        return $this->client()->request($method, $uri, $parameters, [], $server);
    }

    /**
     * @return null|Response
     */
    protected function response()
    {
        return $this->client()->getResponse();
    }

    /**
     * @return string
     */
    protected function getRequestUri()
    {
        return $this->client()->getRequest()->getRequestUri();
    }

    /**
     * @param int $expectedCode
     */
    protected function assertResponseCode($expectedCode = Response::HTTP_OK)
    {
        $msg = '';

        $code = $this->response()->getStatusCode();

        if($code === 500 && ($paragraph = $this->client()->getCrawler()->filter("div.text-exception h1")) && $paragraph->count() > 0) {
            $msg = $paragraph->text();
            $msg.= PHP_EOL . $this->client()->getCrawler()->filter("div#logs")->text();
        }

        $this->assertEquals($expectedCode, $code, $msg);
    }

    protected function assertFormHasNoErrors($form)
    {
        $this->assertCountFormErrors(0, $form);
    }

    /**
     * @param int $expectedCount
     * @param string $form
     *
     * @throws Exception
     */
    protected function assertCountFormErrors($expectedCount = 1, $form)
    {
        if($profiler = $this->client()->getProfile()) {
            $data = $profiler->getCollector('form')->getData();

            if(!array_key_exists($form, $data['forms'])) {
                throw new Exception(sprintf('Form "%s" not found in a page.', $form));
            }

            $formErrors = array_column($data['forms'][$form]['errors'], 'message');
            $formErrorsCount = count($data['forms'][$form]['errors']);

            $childrenErrorsCount = array_filter(array_map(function(array $child) {
                return array_key_exists('errors', $child) ? count($child['errors']) : 0;
            }, $data['forms'][$form]['children']));

            $childrenErrorsMessages = array_filter(array_map(function(array $child) {
                return array_key_exists('errors', $child) ? array_column($child['errors'], 'message') : null;
            }, $data['forms'][$form]['children']));

            $errorsMap = array_map(function($fieldErrorMessages, $key){
                return sprintf('%s: "%s"', $key, implode('", "', $fieldErrorMessages));
            }, $childrenErrorsMessages, array_keys($childrenErrorsMessages));

            $erroredFields = array_keys(array_filter($childrenErrorsCount));
            $sum = array_sum($childrenErrorsCount) + $formErrorsCount;
            $childrenErrorsSum = array_sum($childrenErrorsCount);

            $msg = sprintf(
                "\n Array should contain %d errors but found %d.\n Errored children fields: %d with %d errors (%s)\n Main form [%s]: %d errors (\"%s\"). \n %s\n\n",
                $expectedCount,
                $sum,
                count($erroredFields),
                $childrenErrorsSum,
                implode(', ', $erroredFields),
                $form,
                $formErrorsCount,
                implode('", "', $formErrors),
                implode($errorsMap)
            );
            $this->assertEquals($expectedCount, $sum, $msg);
        }
    }

    /**
     * @param array $messages
     */
    protected function assertValidationMessage(array $messages = [], $form)
    {
        if($profiler = $this->client()->getProfile()) {
            $data = $profiler->getCollector('form')->getData();

            foreach($messages as $fieldMessagePair) {
                list($field, $message, $iShouldSeeValidationMessage) = $fieldMessagePair;
                $errors = $data['forms'][$form]['children'][$field]['errors'];
                $errorMessages = array_column($errors, 'message');

                if($iShouldSeeValidationMessage) {
                    $assertError = sprintf("Validation error '%s' was not found for field '%s'. Only errors found: '%s'", $message, $field, implode(', ', $errorMessages));
                    $this->assertTrue(in_array($message, $errorMessages, true), $assertError);
                } else {
                    $assertError = sprintf("Validation error '%s' was found for field '%s' and that's wrong!!!", $message, $field);
                    $this->assertNotTrue(in_array($message, $errorMessages, true), $assertError);
                }
            }
        }
    }
}