<?php
namespace Gyman\GymanAppBundle\Tests\Functional\Controller;

use Gyman\Component\Test\BaseFunctionalTestCase;
use Gyman\Domain\Member\EmailAddress;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultControllerTest extends BaseFunctionalTestCase
{
    /**
     * @test
     */
    public function register_form_renders_properly()
    {
        $crawler = $this->client->request('GET', $this->getContainer()->get('router')->generate("gyman_landing_index"));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="create_club"]')->first();

        $this->assertCount(8, $form->filter('input, textarea, button, select'));

        $this->assertCount(0, $form->filter('textarea'));
        $this->assertCount(0, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(7, $form->filter('input'));
        $this->assertCount(3, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));
    }

    /**
     * @test
     */
    public function register_form_is_posted_and_club_is_created()
    {
        $crawler = $this->client->request('GET', $this->getContainer()->get('router')->generate("gyman_landing_index"));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="create_club"]')->first()->form();

        $form->setValues([
            'create_club[username]' => 'testowy-admin',
            'create_club[email]'  => 'testowy@admin.pl',
            'create_club[password]' => 'zaq1@WSXcde3',
            'create_club[password_repeat]'    => 'zaq1@WSXcde3',
            'create_club[club]'   => 'Capoeira Camangula',
            'create_club[subdomain]'     => 'camangula',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());

        $this->assertEquals(200, $this->getStatusCode());

        $repository = $this->container->get('doctrine.orm.tenant_entity_manager')->getRepository('Gyman:Member');

        return;

        /** @var Member $member */
        $member = $repository->findOneByEmailAddress(new EmailAddress('andrzej@gazeta.pl'));

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.member_added.success', trim($alert->text()));

        $this->assertEquals($this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]), $this->client->getRequest()->getRequestUri());
        $this->assertEquals('GET', $this->client->getRequest()->getMethod());

        $this->assertEquals($crawler->filter('input#gyman_member_form_firstname')->attr('value'), 'Andrzej');
        $this->assertEquals($crawler->filter('input#gyman_member_form_lastname')->attr('value'), 'Kaszuba');
        $this->assertEquals($crawler->filter('input#gyman_member_form_birthdate')->attr('value'), '18.01.1955');
        $this->assertEquals($crawler->filter('select#gyman_member_form_gender option:selected')->attr('value'), 'male');
        $this->assertEquals($crawler->filter('input#gyman_member_form_zipcode')->attr('value'), '81-353');
        $this->assertEquals($crawler->filter('input#gyman_member_form_phone')->attr('value'), '600 000 000');
        $this->assertEquals($crawler->filter('input#gyman_member_form_email')->attr('value'), 'andrzej@gazeta.pl');
        $this->assertEquals($crawler->filter('input#gyman_member_form_barcode')->attr('value'), '123456789');
        $this->assertEquals($crawler->filter('select#gyman_member_form_belt option:selected')->attr('value'), 'white');
        $this->assertEquals($crawler->filter('textarea#gyman_member_form_notes')->text(), 'some admin notes');

        $this->assertEquals($member->details()->firstname(), 'Andrzej');
        $this->assertEquals($member->details()->lastname(), 'Kaszuba');
        $this->assertEquals($member->details()->birthdate()->format('d.m.Y'), '18.01.1955');
        $this->assertEquals($member->details()->gender(), 'male');
        $this->assertEquals($member->details()->zipcode(), '81-353');
        $this->assertEquals($member->details()->phone(), '600 000 000');
        $this->assertEquals($member->email()->email(), 'andrzej@gazeta.pl');
        $this->assertEquals($member->details()->barcode()->barcode(), '123456789');
        $this->assertEquals($member->details()->belt()->color(), 'white');
        $this->assertEquals($member->details()->notes(), 'some admin notes');

        $this->assertCount(1, $member->sections());
        $this->assertEquals("Kids 4-8", $member->sections()->first()->title());

        $this->assertTrue(Globals::checkIfImageExists($member->details()->foto()->foto()));
        unlink(Globals::applyFileDir($member->details()->foto()->foto()));
    }
}
