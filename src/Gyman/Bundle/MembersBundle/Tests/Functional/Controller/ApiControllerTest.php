<?php
namespace Gyman\MembersBundle\Tests\Functional\Controller;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Test\WebTestCase;
use Gyman\Component\Test\RestTestCase;

/**
 * Class MemberControllerTest
 * @SuppressWarnings(PHPMD.ExcessiveParameterList)
 */
class ApiControllerTest extends WebTestCase
{

    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->prepareClient([
            'HTTP_HOST' => $this->container->getParameter("base_url"),
            'SERVER_NAME' => $this->container->getParameter("base_url")
        ]);

        $this->client->followRedirects();

        $this->doLogin("user", "user");
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
        $this->jsonRequest('GET', $this->getUrl('gyman_api_get_member', ["id" => 1]));
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
            $this->getUrl("gyman_api_get_member", ["id" => 1], true)
        );

        $jsonTestCase->assertPathExists('_links.vouchers');
        $jsonTestCase->assertPathExists('_links.vouchers.href');
        $jsonTestCase->assertPathEquals(
            '_links.vouchers.href',
            $this->getUrl("gyman_api_get_member_get_vouchers", ["id" => 1], true)
        );
    }

    public function testPostMemberApi()
    {
        $this->jsonRequest(
            'POST',
            $this->getUrl('gyman_api_post_member'),
            json_encode([
                "name" => "new name",
                "gender" => Member::GENDER_MALE,
                "belt" => 'white'
            ])
        );

        $this->assertEquals(201, $this->getStatusCode());
        $this->assertJsonResponse();

        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));

        $jsonTestCase->assertPathExists('id');
        $jsonTestCase->assertPathEquals('id', 12);

        $jsonTestCase->assertPathExists('name');
        $jsonTestCase->assertPathEquals('name', "new name");

        $jsonTestCase->assertPathExists('_links');
        $jsonTestCase->assertPathExists('_links.self');
        $jsonTestCase->assertPathExists('_links.self.href');
        $jsonTestCase->assertPathEquals(
            '_links.self.href',
            $this->getUrl("gyman_api_get_member", ["id" => 12], true)
        );

        $member = $this->container->get("doctrine.orm.entity_manager")
            ->getRepository("MembersBundle:Member")
            ->find(12);

        $this->assertEquals($member->getId(), 12);
        $this->assertEquals($member->getName(), "new name");
    }

    public function testPutMemberApi()
    {
        $this->jsonRequest(
            'PUT',
            $this->getUrl('gyman_api_put_member', ["id" => 1]),
            json_encode([
                "name" => "changed-name",
                "gender" => Member::GENDER_MALE,
                "belt" => 'white'
            ])
        );

        $this->assertEquals(200, $this->getStatusCode());
        $this->assertJsonResponse();

        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));

        $jsonTestCase->assertPathExists('id');
        $jsonTestCase->assertPathEquals('id', 1);

        $jsonTestCase->assertPathExists('name');
        $jsonTestCase->assertPathEquals('name', "changed-name");

        $jsonTestCase->assertPathExists('_links');
        $jsonTestCase->assertPathExists('_links.self');
        $jsonTestCase->assertPathExists('_links.self.href');
        $jsonTestCase->assertPathEquals(
            '_links.self.href',
            $this->getUrl("gyman_api_get_member", ["id" => 1], true)
        );

        $member = $this->container->get("doctrine.orm.entity_manager")
            ->getRepository("MembersBundle:Member")
            ->find(1);

        $this->assertEquals($member->getId(), 1);
        $this->assertEquals($member->getName(), "changed-name");
    }

//
//    public function testPostMemberApiError()
//    {
//        $this->jsonRequest(
//            'POST',
//            $this->getUrl('gyman_api_post_member'),
//            json_encode([
//                "username"  => null,
//                "oauthId"   => null,
//            ])
//        );
//
//        $this->assertEquals(422, $this->getStatusCode());
//        $this->assertJsonResponse();
//
//        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));
//
//        $jsonTestCase->assertPathExists('code');
//        $jsonTestCase->assertPathEquals('code', 422);
//
//        $jsonTestCase->assertPathExists('message');
//        $jsonTestCase->assertPathEquals('message', "Validation Failed");
//
//        $jsonTestCase->assertPathExists('errors');
//        $jsonTestCase->assertPathExists('errors.children');
//
//        $jsonTestCase->assertPathExists('errors.children.username');
//        $jsonTestCase->assertPathExists('errors.children.username.errors');
//        $jsonTestCase->assertPathExists('errors.children.username.errors[0]');
//        $jsonTestCase->assertPathEquals('errors.children.username.errors[0]', "This value should not be blank.");
//
//        $jsonTestCase->assertPathExists('errors.children.oauthId');
//        $jsonTestCase->assertPathExists('errors.children.oauthId.errors');
//        $jsonTestCase->assertPathExists('errors.children.oauthId.errors[0]');
//        $jsonTestCase->assertPathEquals('errors.children.oauthId.errors[0]', "This value should not be blank.");
//    }
//
//    public function testPutMemberApi()
//    {
//        $this->jsonRequest(
//            'PUT',
//            $this->getUrl('gyman_api_put_member', ["id" => 1]),
//            json_encode([
//                "username"  => "changed-name",
//                "oauthId"   => "999",
//            ])
//        );
//
//        $member = $this->container->get("doctrine.orm.entity_manager")
//            ->getRepository("TPNMainBundle:Member")
//            ->find(1);
//
//        $this->assertEquals($member->getId(), 1);
//        $this->assertEquals($member->getUsername(), "changed-name");
//        $this->assertEquals($member->getOauthId(), 999);
//
//        $this->assertJsonResponse();
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $jsonTestCase = new RestTestCase(json_decode($this->getContent()));
//        $jsonTestCase->assertPathExists('id');
//        $jsonTestCase->assertPathEquals('id', 1);
//
//        $jsonTestCase->assertPathExists('oauth_id');
//        $jsonTestCase->assertPathEquals('oauth_id', 999);
//
//        $jsonTestCase->assertPathExists('username');
//        $jsonTestCase->assertPathEquals('username', "changed-name");
//
//        $jsonTestCase->assertPathExists('_links.self.href');
//        $jsonTestCase->assertPathEquals('_links.self.href', 'http://http/members/1');
//    }
//
//    public function getMembersApiDataProvider()
//    {
//        return [
//            "member-001" => [
//                "count" => 0,
//                "id" => 1,
//                "oauth" => "1",
//                "username" => "member001",
//                "href" => "http://http/members/1"
//            ],
//            "member-002" => [
//                "count" => 1,
//                "id" => 2,
//                "oauth" => "2",
//                "username" => "member002",
//                "href" => "http://http/members/2"
//            ],
//            "member-003" => [
//                "count" => 2,
//                "id" => 3,
//                "oauth" => "3",
//                "username" => "member003",
//                "href" => "http://http/members/3"
//            ],
//        ];
//    }
}
