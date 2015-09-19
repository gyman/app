<?php
namespace Gyman\VouchersBundle\Tests\Functional\Controller;

use DateTime;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Component\Test\BaseFunctionalTest;

/**
 * Class VouchersControllerTest
 */
class VouchersControllerTest extends BaseFunctionalTest
{
    /**
     * @test
     */
    public function new_voucher_form_renders_properly()
    {
        $member = $this->container->get('gyman.members.repository')->findOneById(5);

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_voucher_new', ['id' => $member->id()]));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_voucher_form"]')->first();

        $this->assertCount(6, $form->filter('input, textarea, button, select'));

        $this->assertCount(0, $form->filter('textarea'));
        $this->assertCount(0, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(5, $form->filter('input'));
        $this->assertCount(2, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=date]'));
        $this->assertCount(2, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));

        $this->assertEquals(
            (new \DateTime('now'))->format('d.m.Y'),
            $form->filter('input#gyman_voucher_form_startDate')->first()->attr('value')
        );

        $this->assertEquals(
            (new \DateTime('+1 month'))->format('d.m.Y'),
            $form->filter('input#gyman_voucher_form_endDate')->first()->attr('value')
        );
    }

    /**
     * @test
     */
    public function new_voucher_form_is_posted_and_entity_is_added()
    {
        $member = $this->container->get('gyman.members.repository')->findOneById(5);

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_voucher_new', ['id' => $member->id()]));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_voucher_form"]')->first()->form();

        $start = (new DateTime('10.11.2015 00:00:00'))->format('d.m.Y');
        $end = (new DateTime('10.12.2015 23:59:59'))->format('d.m.Y');

        $form->setValues([
            'gyman_voucher_form[startDate]'       => $start,
            'gyman_voucher_form[endDate]'         => $end,
            'gyman_voucher_form[price]'           => '123',
            'gyman_voucher_form[maximumAmount]'   => '10',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());
        $this->assertEquals(200, $this->getStatusCode());

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($member);

        $this->assertNotNull($member->vouchers());
        $this->assertEquals(1, $member->vouchers()->count());

        /** @var Voucher $voucher */
        $voucher = $member->vouchers()->last();

        $this->assertEquals($voucher->startDate()->format('Y-m-d H:i:s'), (new DateTime($start . ' 00:00:00'))->format('Y-m-d H:i:s'));
        $this->assertEquals($voucher->endDate()->format('Y-m-d H:i:s'), (new DateTime($end . ' 23:59:59'))->format('Y-m-d H:i:s'));
        $this->assertEquals($voucher->price()->amount(), 123);
        $this->assertEquals($voucher->maximumAmount(), 10);

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.voucher_added.success', trim($alert->text()));

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($voucher);
    }
}
