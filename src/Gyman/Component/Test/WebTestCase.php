<?php

namespace Gyman\Component\Test;


use Symfony\Component\BrowserKit\Client;

class WebTestCase extends ContainerAwareTestCase
{
    /**
     * @var Client;
     */
    protected $client;

    protected $parsedResponse;

    protected function loginAs($username)
    {
        $this->prepareClient(array(
            'PHP_AUTH_USER' => $username,
            'PHP_AUTH_PW'   => $username,
            'HTTP_HOST'     => $this->container->getParameter('base_url')
        ));
    }

    /**
     * @param array $server
     * @return Client
     */
    protected function prepareClient(array $server = array())
    {
        $client = $this->container->get('test.client');
        $client->setServerParameters($server);
        $client->followRedirects(true);
        $this->client = $client;

        return $client;
    }

    private function assertText(array $expectedMessage, $actualMessage)
    {
        if (isset($expectedMessage['text'])) {
            foreach ($expectedMessage['text'] as $text) {
                $this->assertContains(
                    $text,
                    $actualMessage->getBody()
                );
            }
        }
    }

    protected function translate($textToTranslation, $translationParams = array())
    {
        $translator = $this->container->get('translator');

        return $translator->trans($textToTranslation, $translationParams);
    }

    protected function thenResponseStatusEquals($statusCode)
    {
        $this->assertSame($statusCode, $this->client->getResponse()->getStatusCode());
    }

    protected function thenResponseIsJson()
    {
        $data = json_decode($this->client->getResponse()->getContent(), true);
        $this->assertTrue(is_array($data));
        $this->parsedResponse = $data;
    }

    protected function thenReturnedElementsCountEquals($expected)
    {
        $this->assertSame($expected, count($this->parsedResponse));
    }

    protected function dumpResponse($die = true)
    {
        var_dump($this->client->getResponse()->getContent());
        if ($die) {
            die;
        }
    }

    protected function thenJsonResponseContainsKey($key)
    {
        $this->assertContains($key, array_keys($this->parsedResponse));
    }

    protected function thenJsonResponseContainsKeyValuePair($key, $value)
    {
        $this->assertContains($key, array_keys($this->parsedResponse, $value));
    }
}
