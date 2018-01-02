<?php

declare(strict_types=1);

namespace Gyman\GymanAppBundle\Tests\Functional\Controller;

use Gyman\Component\Test\RestTestCase;
use Gyman\Component\Test\WebTestCase;
use Gyman\Domain\Member;

/**
 * Class MemberControllerTest.
 *
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 * @coversNothing
 */
class ApiControllerTestCase extends WebTestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->prepareClient([
            'HTTP_HOST'   => $this->container->getParameter('base_url'),
            'SERVER_NAME' => $this->container->getParameter('base_url'),
        ]);

        $this->client->followRedirects();

        $this->doLogin('user', 'user');
    }

    public function testGetMembersApi()
    {
        $this->jsonRequest('GET', $this->getUrl('gyman_api_get_members'));
        $this->assertEquals(200, $this->getStatusCode());

        $this->assertJsonResponse();

        $this->assertCount(11, json_decode($this->getContent()));
    }

    public function testGetMemberApi()
    {
        $this->jsonRequest('GET', $this->getUrl('gyman_api_get_member', ['id' => 1]));
        $this->assertEquals(200, $this->getStatusCode());
        $this->assertJsonResponse();

        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));

        $jsonTestCase->assertPathExists('id');
        $jsonTestCase->assertPathEquals('id', 1);

        $jsonTestCase->assertPathExists('name');
        $jsonTestCase->assertPathEquals('name', 'Jan Kowalski');

        $jsonTestCase->assertPathExists('_links');

        $jsonTestCase->assertPathExists('_links.self');
        $jsonTestCase->assertPathExists('_links.self.href');
        $jsonTestCase->assertPathEquals(
            '_links.self.href',
            $this->getUrl('gyman_api_get_member', ['id' => 1], true)
        );

        $jsonTestCase->assertPathExists('_links.vouchers');
        $jsonTestCase->assertPathExists('_links.vouchers.href');
        $jsonTestCase->assertPathEquals(
            '_links.vouchers.href',
            $this->getUrl('gyman_api_get_member_get_vouchers', ['id' => 1], true)
        );
    }

    public function testPostMemberApi()
    {
        $this->jsonRequest(
            'POST',
            $this->getUrl('gyman_api_post_member'),
            json_encode([
                'name'   => 'new name',
                'gender' => Member::GENDER_MALE,
                'belt'   => 'white',
            ])
        );

        $this->assertEquals(201, $this->getStatusCode());
        $this->assertJsonResponse();

        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));

        $jsonTestCase->assertPathExists('id');
        $jsonTestCase->assertPathEquals('id', 12);

        $jsonTestCase->assertPathExists('name');
        $jsonTestCase->assertPathEquals('name', 'new name');

        $jsonTestCase->assertPathExists('_links');
        $jsonTestCase->assertPathExists('_links.self');
        $jsonTestCase->assertPathExists('_links.self.href');
        $jsonTestCase->assertPathEquals(
            '_links.self.href',
            $this->getUrl('gyman_api_get_member', ['id' => 12], true)
        );

        $member = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('Gyman:Member')
            ->find(12);

        $this->assertEquals($member->getId(), 12);
        $this->assertEquals($member->getName(), 'new name');
    }

    public function testPutMemberApi()
    {
        $this->jsonRequest(
            'PUT',
            $this->getUrl('gyman_api_put_member', ['id' => 1]),
            json_encode([
                'name'   => 'changed-name',
                'gender' => Member::GENDER_MALE,
                'belt'   => 'white',
            ])
        );

        $this->assertEquals(200, $this->getStatusCode());
        $this->assertJsonResponse();

        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));

        $jsonTestCase->assertPathExists('id');
        $jsonTestCase->assertPathEquals('id', 1);

        $jsonTestCase->assertPathExists('name');
        $jsonTestCase->assertPathEquals('name', 'changed-name');

        $jsonTestCase->assertPathExists('_links');
        $jsonTestCase->assertPathExists('_links.self');
        $jsonTestCase->assertPathExists('_links.self.href');
        $jsonTestCase->assertPathEquals(
            '_links.self.href',
            $this->getUrl('gyman_api_get_member', ['id' => 1], true)
        );

        $member = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('Gyman:Member')
            ->find(1);

        $this->assertEquals($member->getId(), 1);
        $this->assertEquals($member->getName(), 'changed-name');
    }
}
