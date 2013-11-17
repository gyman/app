<?php

namespace Gyman\Bundle\ApiBundle\Tests\Controller;

use Gyman\Component\Test\WebTestCase;

class MemberControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function it_gets_list_of_members_for_logged_in_user()
    {
        $this->loginAs("uirapuru");

        $crawler = $this->client->request('GET', '/api/members');

        var_dump($this->client->getResponse()->getContent());

        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());


        var_dump( $this->client->getResponse()->getContent());
    }

}