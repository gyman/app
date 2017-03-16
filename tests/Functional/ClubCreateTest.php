<?php
namespace Tests\Functional;

use Symfony\Component\HttpFoundation\Request;
use Tests\FunctionalTestCase;

class ClubCreateTest extends FunctionalTestCase
{
    /**
     * @test
     */
    public function it_registers_new_user_and_creates_a_club_with_db_and_subdomain()
    {
        $client = $this->makeClient(false, [
            'host' => 'gyman.vagrant'
        ]);

        $client->followRedirects();

        $client->setServerParameters([
            'HTTP_HOST' => 'gyman.vagrant',
            'HOST'      => 'gyman.vagrant',
        ]);

        $this->client = $client;

        $crawler = $client->request(Request::METHOD_GET, '/');

        $this->assertResponseCode();


        $form = $crawler->selectButton("Submit")->form([
            "create_club[username]" => "username",
            "create_club[email]" => "some@email.pl",
            "create_club[password]" => "password",
            "create_club[password_repeat]" => "password",
            "create_club[club]" => "club",
            "create_club[subdomain]" => "test",
        ]);

        $crawler = $client->submit($form);

        die(var_dump($crawler->html()));
        $this->assertFormHasNoErrors('create_club');
    }
}