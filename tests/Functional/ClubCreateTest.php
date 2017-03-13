<?php
namespace Tests\Functional;

use Symfony\Component\HttpFoundation\Request;

class ClubCreateTest extends FunctionalTestCase
{

    public function setUp()
    {
        $this->loadFixtureFiles([
            "app/DoctrineFixtures/Yaml/calendars.yml"
        ], "tenant");
    }

    /**
     * @test
     */
    public function it_registers_new_user_and_creates_a_club_with_db_and_subdomain()
    {
        $client = $this->makeClient(false, [
            'host' => 'gyman.vagrant'
        ]);

        $crawler = $client->request(Request::METHOD_GET, '/');

        $form = $crawler->selectButton("Submit")->form();

        die(var_dump($form->filter("input")->count()));

        $form = $crawler->filter("form[name=create_club]")->form();


        $this->assertEquals(7, $form->filter("input")->count());
    }
}