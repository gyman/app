<?php
namespace Gyman\MembersBundle\Tests\Functional\Controller;

use Gyman\Bundle\DefaultBundle\Lib\Globals;
use Gyman\Bundle\MembersBundle\Entity\EmailAddress;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Component\Test\BaseFunctionalTest;
use Gyman\Domain\Model\Belt;
use Gyman\Domain\Model\Details;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_new'));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_member_form"]')->first();

        $this->assertCount(13, $form->filter('input, textarea, button, select'));

        $this->assertCount(1, $form->filter('textarea'));
        $this->assertCount(2, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(9, $form->filter('input'));
        $this->assertCount(7, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));

        $this->assertCount(count(Details::$genders), $crawler->filter('select#gyman_member_form_gender option'));
        $this->assertCount(count(Belt::$colors) + 1, $crawler->filter('select#gyman_member_form_belt option'));
    }

    /**
     * @test
     */
    public function edit_member_form_renders_properly()
    {
        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
            ->getRepository('MembersBundle:Member')
            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_member_form"]')->first();

        $this->assertCount(13, $form->filter('input, textarea, button, select'));

        $this->assertCount(1, $form->filter('textarea'));
        $this->assertCount(2, $form->filter('select'));
        $this->assertCount(1, $form->filter('button'));
        $this->assertCount(9, $form->filter('input'));
        $this->assertCount(7, $form->filter('input[type=text]'));
        $this->assertCount(0, $form->filter('input[type=number]'));
        $this->assertCount(0, $form->filter('input[type=checkbox]'));
        $this->assertCount(1, $form->filter('input[type=hidden]'));

        $this->assertCount(count(Details::$genders), $crawler->filter('select#gyman_member_form_gender option'));
        $this->assertCount(count(Belt::$colors) + 1, $crawler->filter('select#gyman_member_form_belt option'));
    }

    /**
     * @test
     */
    public function new_member_form_is_posted_and_entity_is_added()
    {
        $this->prepareFoto();

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_new'));

        $this->assertEquals(200, $this->getStatusCode());

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

        $uploadedFile = new UploadedFile(
            '/tmp/foto.jpg',
            'someTestFile.jpg',
            'image/jpeg',
            123
        );

        $files = [
            'gyman_member_form' => [
                'foto' => $uploadedFile,
            ],
        ];

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);

        $this->assertEquals(200, $this->getStatusCode());

        $repository = $this->container->get('doctrine.orm.club_entity_manager')->getRepository('MembersBundle:Member');

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

        $this->assertFileExists(Globals::applyFilePath($member->details()->foto()->foto()));
        unlink(Globals::applyFilePath($member->details()->foto()->foto()));
    }

    /**
     * @test
     */
    public function member_edit_form_is_posted_and_entity_is_changed()
    {
        $this->prepareFoto();

        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
            ->getRepository('MembersBundle:Member')
            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));

        $this->assertEquals(200, $this->getStatusCode());

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

        $uploadedFile = new UploadedFile(
            '/tmp/foto.jpg',
            'someTestFile.jpg',
            'image/jpeg',
            123
        );

        $files = [
            'gyman_member_form' => [
                'foto' => $uploadedFile,
            ],
        ];

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);

        $this->assertEquals(200, $this->getStatusCode());

        $repository = $this->container->get('doctrine.orm.club_entity_manager')->getRepository('MembersBundle:Member');

        /** @var Member $member */
        $member = $repository->findOneByEmailAddress(new EmailAddress('andrzej@gazeta.pl'));

        $alert = $crawler->filter('div.alert.alert-success');
        $this->assertEquals('flash.member_editted.success', trim($alert->text()));

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

        $this->assertFileExists(Globals::applyFilePath($member->details()->foto()->foto()));
    }

    /**
     * @test
     * @dataProvider getErrorGeneratingForms
     */
    public function new_member_form_is_posted_and_error_is_emitted($values, $elementPath, $error)
    {
        $this->prepareFoto();

        $files = [
            'gyman_member_form' => [
                'foto' => new UploadedFile(
                    '/tmp/foto.jpg',
                    'someTestFile.jpg',
                    'image/jpeg',
                    123
                ),
            ],
        ];

        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
            ->getRepository('MembersBundle:Member')
            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();

        $form->setValues($values);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);

        $this->assertEquals(400, $this->getStatusCode());

        $alert = $crawler->filter('div.alert.alert-danger');
        $this->assertEquals('flash.member_editted.errors', trim($alert->text()));
        $this->assertEquals($error, trim($crawler->filter($elementPath)->text()));
    }

    /**
     * @test
     * @dataProvider getErrorGeneratingForms
     */
    public function member_edit_form_is_posted_and_error_is_emitted($values, $elementPath, $error)
    {
        $this->prepareFoto();

        $files = [
            'gyman_member_form' => [
                'foto' => new UploadedFile(
                    '/tmp/foto.jpg',
                    'someTestFile.jpg',
                    'image/jpeg',
                    123
                ),
            ],
        ];

        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_new'));

        $this->assertEquals(200, $this->getStatusCode());

        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();

        $form->setValues($values);

        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);

        $this->assertEquals(400, $this->getStatusCode());

        $alert = $crawler->filter('div.alert.alert-danger');
        $this->assertEquals('flash.member_added.errors', trim($alert->text()));
        $this->assertEquals($error, trim($crawler->filter($elementPath)->text()));
    }

    public function getErrorGeneratingForms()
    {
        $correctData = [
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
        ];

        return [
            'empty firstname' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[firstname]' => null,
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(1) .controls .help-block',
                'error'       => 'Pole nie może być puste!',
            ],
            'empty lastname' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[lastname]' => null,
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(2) .controls .help-block',
                'error'       => 'Pole nie może być puste!',
            ],
            'empty email' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[email]' => null,
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
                'error'       => 'Pole nie może być puste!',
            ],
            'wrong email' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[email]' => 'errornous-address',
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
                'error'       => "Adres '{{ value }}' nie jest poprawny.",
            ],
            'existing email' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[email]' => 'test01@test.pl',
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
                'error'       => 'Ten email jest już zarejestrowany',
            ],
            'existing barcode' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[barcode]' => 'abcd12301',
                    ]
                ),
                'elementPath' => '#additionalsPane div.control-group.error:nth-child(1) .controls .help-block',
                'error'       => 'Ten kod jest już zarejestrowany',
            ],
            'wrong zipcode' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[zipcode]' => 'XYZTAAA',
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(5) .controls .help-block',
                'error'       => "This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.\n            Kod pocztowy musi być w formacie XX-XXX",
            ],
            'wrong birthdate' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[birthdate]' => '2015-01-01',
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
                'error'       => 'This value is not valid.',
            ],
            'too late birthdate' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[birthdate]' => (new \DateTime('+1 day'))->format('d.m.Y'),
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
                'error'       => 'Data powinna być przed {{ limit }}.',
            ],
            'too early birthdate' => [
                'values' => array_merge(
                    $correctData,
                    [
                        'gyman_member_form[birthdate]' => (new \DateTime('-100 years'))->format('d.m.Y'),
                    ]
                ),
                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
                'error'       => 'Data powinna być po {{ limit }}.',
            ],
        ];
    }

    private function prepareFoto()
    {
        copy(realpath(__DIR__ . '/../../Resources/foto.jpg'), '/tmp/foto.jpg');
    }
}
