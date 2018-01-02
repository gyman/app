<?php

declare(strict_types=1);

namespace Gyman\Component\Test;

use Symfony\Component\BrowserKit\Client;

/**
 * @coversNothing
 */
class WebTestCase extends ContainerAwareTestCase
{
    /**
     * @var Client;
     */
    protected $client;
    /**
     * @var Crawler
     */
    protected $crawler;
    protected $parsedResponse;

    public function doLogin($username, $password)
    {
        $crawler = $this->client->request('GET', '/login');
        $form = $crawler->selectButton('_submit')->form([
            '_username'  => $username,
            '_password'  => $password,
        ]);
        $this->client->submit($form);
    }

    public function assertResponseHeaderExists($header)
    {
        $this->assertTrue(
            $this->client->getResponse()->headers->has($header),
            "Response header '$header' doesn't exist"
        );
    }

    protected function loginAs($username)
    {
        $this->prepareClient([
            'PHP_AUTH_USER' => $username,
            'PHP_AUTH_PW'   => $username,
            'HTTP_HOST'     => $this->container->getParameter('base_url'),
        ]);
    }

    /**
     * @param array $server
     *
     * @return Client
     */
    protected function prepareClient(array $server = [])
    {
        $client = $this->container->get('test.client');
        $client->setServerParameters($server);
        $client->followRedirects(true);
        $this->client = $client;

        return $client;
    }

    protected function assertText(array $expectedMessage, $actualMessage)
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

    protected function translate($textToTranslation, $translationParams = [])
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
        $this->assertInternalType('array', $data);
        $this->parsedResponse = $data;
    }

    protected function thenReturnedElementsCountEquals($expected)
    {
        $this->assertSame($expected, count($this->parsedResponse));
    }

    /**
     * @SuppressWarnings(PHPMD.ExitExpression)
     *
     * @param bool $die
     */
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
        $this->assertContains($key, array_keys($this->parsedResponse, $value, true));
    }

    /**
     * Get an URI from route & parameters.
     *
     * @param string $route    route name
     * @param array  $params   route parameters
     * @param bool   $absolute
     *
     * @return string
     */
    protected function getUrl($route, $params = [], $absolute = false)
    {
        return $this->container->get('router')->generate($route, $params, $absolute);
    }

    /**
     * @return bool
     */
    protected function assertJsonResponse()
    {
        $this->assertTrue(
            $this->client->getResponse()->headers->contains('Content-Type', 'application/json'),
            'No content-type: application/json in response header'
        );
        $this->assertJson(
            $this->getContent(),
            'Returned content is not a valid JSON'
        );
    }

    protected function assertContentLocationHeader()
    {
        $this->assertTrue(
            $this->client->getResponse()->headers->has('Content-Location'),
            "'Content-Location' header is missing"
        );
    }

    /**
     * @return mixed
     */
    protected function getContent()
    {
        return $this->client->getResponse()->getContent();
    }

    /**
     * @return int
     */
    protected function getStatusCode()
    {
        return $this->client->getResponse()->getStatusCode();
    }

    /**
     * @param $method
     * @param $path
     * @param null $content
     */
    protected function jsonRequest($method, $path, $content = null)
    {
        $this->crawler = $this->client->request(
            $method,
            $path,
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            $content
        );
    }
}
