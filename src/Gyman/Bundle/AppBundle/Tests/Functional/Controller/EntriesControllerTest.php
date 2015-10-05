<?php
namespace Gyman\Bundle\AppBundle\Tests\Functional\Controller;

use Carbon\Carbon;
use Gyman\Component\Test\BaseFunctionalTest;
use Gyman\Domain\Model\Entry;
use Gyman\Domain\Model\Member;

/**
 * Class EntriesControllerTest
 */
class EntriesControllerTest extends BaseFunctionalTest
{
    /**
     * @test
     */
    public function new_entry_form_renders_properly_for_member_with_voucher()
    {
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Sylwia', 'details.lastname' => 'Grzeszczak']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_new', ['id' => $member->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_entry_form"]')->first();

        $this->assertCount(7, $form->filter('input, textarea, button, select'));

        $this->assertCount(0, $form->filter('textarea'));
        $this->assertCount(0, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(6, $form->filter('input'));
        $this->assertCount(1, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=date]'));
        $this->assertCount(1, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(3, $form->filter('input[type=radio]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));

        $this->assertEquals(
            Carbon::now()->format('d.m.Y H:i'),
            $form->filter('input#gyman_entry_form_startDate')->first()->attr('value')
        );
    }

    /**
     * @test
     */
    public function new_entry_form_renders_properly_for_member_without_voucher()
    {
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Tomasz', 'details.lastname' => 'Marek']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_new', ['id' => $member->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_entry_form"]')->first();

        $this->assertCount(6, $form->filter('input, textarea, button, select'));

        $this->assertCount(0, $form->filter('textarea'));
        $this->assertCount(0, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(5, $form->filter('input'));
        $this->assertCount(1, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=date]'));
        $this->assertCount(1, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));
        $this->assertCount(2, $form->filter('input[type=radio]'));

        $this->assertEquals(
            Carbon::now()->format('d.m.Y H:i'),
            $form->filter('input#gyman_entry_form_startDate')->first()->attr('value')
        );
    }

    /**
     * @test
     */
    public function open_entry_form_is_posted_without_voucher()
    {
        /** @var Member $member */
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Kryspin', 'details.lastname' => 'Kryszak']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);
        $this->assertFalse($member->hasCurrentVoucher());
        $this->assertNull($member->lastEntry());

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_new', ['id' => $member->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_entry_form"]')->first()->form();

        $form->setValues([
            'gyman_entry_form[startDate]' => Carbon::now()->format('d.m.Y H:i'),
            'gyman_entry_form[entryType]' => Entry::TYPE_PAID,
            'gyman_entry_form[price]'     => '123',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());
        $this->assertEquals(200, $this->getStatusCode());

        $this->assertEquals(
            $this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]),
            $this->client->getRequest()->getRequestUri()
        );

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.entry_opened.success', trim($alert->text()));

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($member);

        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Entry", $member->lastEntry());
    }

    /**
     * @test
     */
    public function open_entry_form_is_posted_with_voucher()
    {
        /** @var Member $member */
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Sylwia', 'details.lastname' => 'Grzeszczak']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);
        $this->assertTrue($member->hasCurrentVoucher());
        $this->assertNull($member->lastEntry());

        $voucherEntries = $member->currentVoucher()->leftEntriesAmount();
        $this->assertEquals(10, $voucherEntries);

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_new', ['id' => $member->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_entry_form"]')->first()->form();

        $form->setValues([
            'gyman_entry_form[startDate]' => Carbon::now()->format('d.m.Y H:i'),
            'gyman_entry_form[entryType]' => Entry::TYPE_VOUCHER,
            'gyman_entry_form[price]'     => '123',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());
        $this->assertEquals(200, $this->getStatusCode());

//        die(print_r($crawler->filter('form[name="gyman_entry_form"]')->text()));

        $this->assertEquals(
            $this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]),
            $this->client->getRequest()->getRequestUri()
        );

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.entry_opened.success', trim($alert->text()));

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($member);

        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Entry", $member->lastEntry());

        $voucherEntries = $member->currentVoucher()->leftEntriesAmount();
        $this->assertEquals(9, $voucherEntries);
    }

    /**
     * @test
     */
    public function free_open_entry_form_is_posted()
    {
        /** @var Member $member */
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Sylwia', 'details.lastname' => 'Grzeszczak']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);
        $this->assertTrue($member->hasCurrentVoucher());
        $this->assertNull($member->lastEntry());

        $this->assertEquals(10, $member->currentVoucher()->leftEntriesAmount());

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_new', ['id' => $member->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_entry_form"]')->first()->form();

        $form->setValues([
            'gyman_entry_form[startDate]' => Carbon::now()->format('d.m.Y H:i'),
            'gyman_entry_form[entryType]' => Entry::TYPE_FREE,
            'gyman_entry_form[price]'     => '123',
        ]);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues());
        $this->assertEquals(200, $this->getStatusCode());

        $this->assertEquals(
            $this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]),
            $this->client->getRequest()->getRequestUri()
        );

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.entry_opened.success', trim($alert->text()));

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($member);

        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Entry", $member->lastEntry());

        $this->assertEquals(10, $member->currentVoucher()->leftEntriesAmount());
    }

    /**
     * @test
     */
    public function close_entry_form_is_called()
    {
        /** @var Member $member */
        $member = $this->container->get('gyman.members.repository')->findOneBy(['details.firstname' => 'Jan', 'details.lastname' => 'Kowalski']);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Member", $member);
        $this->assertInstanceOf("Gyman\Bundle\AppBundle\Entity\Entry", $member->lastEntry());

        $lastEntry = $member->lastEntry();

        $this->assertEquals(10, $member->currentVoucher()->leftEntriesAmount());

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_entry_close', ['id' => $lastEntry->id()]));
        $this->assertEquals(200, $this->getStatusCode());

        $this->assertEquals(
            $this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]),
            $this->client->getRequest()->getRequestUri()
        );

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.entry_closed.success', trim($alert->text()));

        $this->container->get('doctrine.orm.club_entity_manager')->refresh($member);
        $this->container->get('doctrine.orm.club_entity_manager')->refresh($lastEntry);

        $this->assertNull($member->lastEntry());
        $this->assertInstanceOf("\DateTime", $lastEntry->endDate());
        $this->assertEquals(10, $member->currentVoucher()->leftEntriesAmount());
    }
}
