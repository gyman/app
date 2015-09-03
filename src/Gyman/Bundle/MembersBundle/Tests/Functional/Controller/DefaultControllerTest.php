<?php
namespace Gyman\MembersBundle\Tests\Functional\Controller;

use Gyman\Bundle\MembersBundle\Entity\EmailAddress;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Members\Model\Belt;
use Gyman\Component\Members\Model\Details;
use Gyman\Component\Test\BaseFunctionalTest;

/**
 * Class MemberControllerTest
 */
class DefaultControllerTest extends BaseFunctionalTest
{
    /**
     * @test
     */
    public function new_member_form_renders_properly()
    {
        $crawler = $this->client->request('GET', $this->container->get('router')->generate('_member_new'));
        $form = $crawler->filter('form[name="gyman_member_form"]')->first();

        $this->assertCount(13, $form->filter('input, textarea, button, select'));

        $this->assertCount(1, $form->filter('textarea'));
        $this->assertCount(2, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(9, $form->filter('input'));
        $this->assertCount(7, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(2, $form->filter('input[type=hidden]'));

        $this->assertCount(count(Details::$genders), $crawler->filter('select#gyman_member_form_gender option'));
        $this->assertCount(count(Belt::$colors), $crawler->filter('select#gyman_member_form_belt option'));
    }

    /**
     * @test
     */
    public function new_member_form_is_posted_and_entity_is_added()
    {
        $crawler = $this->client->request('GET', $this->container->get('router')->generate('_member_new'));
        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();

        $form->setValues([
            'gyman_member_form[firstname]' => 'Andrzej',
            'gyman_member_form[lastname]'  => 'Kaszuba',
            'gyman_member_form[birthdate]' => '18.01.1955',
            'gyman_member_form[gender]'    => 'male',
            'gyman_member_form[zipcode]'   => '81-353',
            'gyman_member_form[phone]'     => '600 000 000',
            'gyman_member_form[email]'     => 'andrzej@gazeta.pl',
            'gyman_member_form[barcode]'   => '123456789',
            'gyman_member_form[belt]'      => 'white',
            'gyman_member_form[notes]'     => 'some admin notes',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());

        $this->assertEquals(200, $this->getStatusCode());

        $repository = $this->container->get('doctrine.orm.club_entity_manager')->getRepository('MembersBundle:Member');

        /** @var Member $member */
        $member = $repository->findOneByEmailAddress(new EmailAddress('andrzej@gazeta.pl'));

//        $alert = $crawler->filter('div.alert.alert-success');
//        $this->assertEquals('flash.car_edit.success', trim($alert->text()));

        $this->assertEquals($this->container->get('router')->generate('_member_edit', ['id' => $member->id()]), $this->client->getRequest()->getRequestUri());
        $this->assertEquals('GET', $this->client->getRequest()->getMethod());

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
    }
}
