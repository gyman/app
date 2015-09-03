<?php
namespace Gyman\MembersBundle\Tests\Functional\Controller;

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
    public function new_member_form_renders_properly() {
        $this->client->followRedirects(false);
        $crawler = $this->client->request('GET', $this->container->get('router')->generate('_member_new'));
        $form = $crawler->filter('form[name="member"]')->first();

        $this->assertCount(13, $form->filter('input, textarea, button, select'));

        $this->assertCount(1, $form->filter('textarea'));
        $this->assertCount(2, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(9, $form->filter('input'));
        $this->assertCount(7, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(2, $form->filter('input[type=hidden]'));

        $this->assertCount(count(Details::$genders), $crawler->filter('select#member_gender option'));
    }


    /**
     * test
     */
    public function new_member_form_is_posted_and_entity_is_added() {
        $this->client->followRedirects(false);
        $crawler = $this->client->request('GET', $this->container->get('router')->generate('_member_new'));
        $forms   = $crawler->filter('form[name="gyman_members_member_form_type"]')->getNode(0);



    }

}
