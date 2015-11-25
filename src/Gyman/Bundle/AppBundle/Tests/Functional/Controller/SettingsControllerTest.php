<?php
namespace Gyman\GymanAppBundle\Tests\Functional\Controller;

use Dende\Calendar\Domain\Calendar;
use Gyman\Bundle\AppBundle\Entity\Section;
use Gyman\Component\Test\BaseFunctionalTest;
use Symfony\Component\DomCrawler\Field\FormField;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class SettingsControllerTest
 * @package Gyman\GymanAppBundle\Tests\Functional\Controller
 */
class SettingsControllerTest extends BaseFunctionalTest
{
    /**
     * @test
     */
    public function settings_form_renders_properly()
    {
        $crawler = $this->client->request('GET', '/settings/');
        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="club_settings"]')->first();

        $this->assertCount(22, $form->filter('input, textarea, button, select'));

        $this->assertCount(1, $form->filter('textarea'));
        $this->assertCount(0, $form->filter('select'));
        $this->assertCount(2, $form->filter('button'));
        $this->assertCount(19, $form->filter('input'));
        $this->assertCount(14, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(4, $form->filter('input[type=hidden]'));

        $this->assertCount(3, $crawler->filter('input[id*="club_settings_sections"][type=text]'));
    }

    /**
     * @test
     */
    public function adding_new_section_creates_a_new_section_entity_and_a_calendar(){
        $crawler = $this->client->request('GET', '/settings/');
        $this->assertEquals(200, $this->getStatusCode());

        $formElement = $crawler->filter('form')->first();
        $form = $formElement->form();
        $sectionIndex = $crawler->filter('input[id*="club_settings_sections"][type=text]')->count();
        $values = $form->getPhpValues();

        unset($values['club_settings']['sections'][$sectionIndex - 1]);

        $values['club_settings']['sections'][$sectionIndex]['id'] = null;
        $values['club_settings']['sections'][$sectionIndex]['title'] = 'newly_added_section';

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $values, $form->getPhpFiles());
        $this->assertEquals(200, $this->getStatusCode());
        $this->assertContains('flash.settings_updated.success', $crawler->text());
        $this->assertEquals('/settings/', $this->client->getRequest()->getRequestUri());

        $em = $this->getContainer()->get('doctrine.orm.club_entity_manager');

        $calendar = $em->getRepository('Calendar:Calendar')->findOneByName('newly_added_section');
        $section = $em->getRepository('GymanAppBundle:Section')->findOneByTitle('newly_added_section');

        $this->assertInstanceOf(Calendar::class, $calendar);
        $this->assertInstanceOf(Section::class, $section);

        $calendar = $em->getRepository('Calendar:Calendar')->findOneByName('Brazilian Jiu Jitsu');
        $section = $em->getRepository('GymanAppBundle:Section')->findOneByTitle('Brazilian Jiu Jitsu');

        $this->assertNull($calendar);
        $this->assertNull($section);
    }
}
