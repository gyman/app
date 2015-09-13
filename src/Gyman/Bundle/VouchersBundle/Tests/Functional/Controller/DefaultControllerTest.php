<?php
namespace Gyman\VouchersBundle\Tests\Functional\Controller;

use DateTime;
use Gyman\Bundle\MembersBundle\Entity\Member;
use Gyman\Bundle\VouchersBundle\Entity\Voucher;
use Gyman\Component\Members\Model\Belt;
use Gyman\Component\Members\Model\Details;
use Gyman\Component\Test\BaseFunctionalTest;

/**
 * Class DefaultControllerTest
 */
class DefaultControllerTest extends BaseFunctionalTest
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
//
//    /**
//     * @test
//     */
//    public function edit_member_form_renders_properly()
//    {
//        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
//            ->getRepository('MembersBundle:Member')
//            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));
//
//        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));
//
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $form = $crawler->filter('form[name="gyman_member_form"]')->first();
//
//        $this->assertCount(13, $form->filter('input, textarea, button, select'));
//
//        $this->assertCount(1, $form->filter('textarea'));
//        $this->assertCount(2, $form->filter('select'));
//        $this->assertCount(1, $form->filter('button'));
//        $this->assertCount(9, $form->filter('input'));
//        $this->assertCount(7, $form->filter('input[type=text]'));
//        $this->assertCount(0, $form->filter('input[type=number]'));
//        $this->assertCount(0, $form->filter('input[type=checkbox]'));
//        $this->assertCount(1, $form->filter('input[type=hidden]'));
//
//        $this->assertCount(count(Details::$genders), $crawler->filter('select#gyman_member_form_gender option'));
//        $this->assertCount(count(Belt::$colors) + 1, $crawler->filter('select#gyman_member_form_belt option'));
//    }
//
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

//        $this->assertEquals(
//            $this->container->get('router')->generate('gyman_member_edit', ['id' => $voucher->member()->id()]),
//            $this->client->getRequest()->getRequestUri()
//        );

//        $this->assertEquals('GET', $this->client->getRequest()->getMethod());
//
//        $this->assertEquals($member->details()->firstname(), 'Andrzej');
//        $this->assertEquals($member->details()->lastname(), 'Kaszuba');
//        $this->assertEquals($member->details()->birthdate()->format('d.m.Y'), '18.01.1955');
//        $this->assertEquals($member->details()->gender(), 'male');
//        $this->assertEquals($member->details()->zipcode(), '81-353');
//        $this->assertEquals($member->details()->phone(), '600 000 000');
//        $this->assertEquals($member->email()->email(), 'andrzej@gazeta.pl');
//        $this->assertEquals($member->details()->barcode()->barcode(), '123456789');
//        $this->assertEquals($member->details()->belt()->color(), 'white');
//        $this->assertEquals($member->details()->notes(), 'some admin notes');
//
//        $this->assertFileExists(Globals::applyFilePath($member->details()->foto()->foto()));
//        unlink(Globals::applyFilePath($member->details()->foto()->foto()));
    }
//
//    /**
//     * @test
//     */
//    public function member_edit_form_is_posted_and_entity_is_changed()
//    {
//        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
//            ->getRepository('MembersBundle:Member')
//            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));
//
//        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));
//
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();
//
//        $form->setValues([
//            'gyman_member_form[firstname]' => 'Andrzej',
//            'gyman_member_form[lastname]'  => 'Kaszuba',
//            'gyman_member_form[birthdate]' => '18.01.1955',
//            'gyman_member_form[gender]'    => 'male',
//            'gyman_member_form[zipcode]'   => '81-353',
//            'gyman_member_form[phone]'     => '600 000 000',
//            'gyman_member_form[email]'     => 'andrzej@gazeta.pl',
//            'gyman_member_form[barcode]'   => '123456789',
//            'gyman_member_form[belt]'      => 'white',
//            'gyman_member_form[notes]'     => 'some admin notes',
//        ]);
//
//        $uploadedFile = new UploadedFile(
//            '/tmp/foto.jpg',
//            'someTestFile.jpg',
//            'image/jpeg',
//            123
//        );
//
//        $files = [
//            'gyman_member_form' => [
//                'foto' => $uploadedFile,
//            ],
//        ];
//
//        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);
//
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $repository = $this->container->get('doctrine.orm.club_entity_manager')->getRepository('MembersBundle:Member');
//
//        /** @var Member $member */
//        $member = $repository->findOneByEmailAddress(new EmailAddress('andrzej@gazeta.pl'));
//
//        $alert = $crawler->filter('div.alert.alert-success');
//        $this->assertEquals('flash.member_editted.success', trim($alert->text()));
//
//        $this->assertEquals($this->container->get('router')->generate('gyman_member_edit', ['id' => $member->id()]), $this->client->getRequest()->getRequestUri());
//        $this->assertEquals('GET', $this->client->getRequest()->getMethod());
//
//        $this->assertEquals($member->details()->firstname(), 'Andrzej');
//        $this->assertEquals($member->details()->lastname(), 'Kaszuba');
//        $this->assertEquals($member->details()->birthdate()->format('d.m.Y'), '18.01.1955');
//        $this->assertEquals($member->details()->gender(), 'male');
//        $this->assertEquals($member->details()->zipcode(), '81-353');
//        $this->assertEquals($member->details()->phone(), '600 000 000');
//        $this->assertEquals($member->email()->email(), 'andrzej@gazeta.pl');
//        $this->assertEquals($member->details()->barcode()->barcode(), '123456789');
//        $this->assertEquals($member->details()->belt()->color(), 'white');
//        $this->assertEquals($member->details()->notes(), 'some admin notes');
//
//        $this->assertFileExists(Globals::applyFilePath($member->details()->foto()->foto()));
//        unlink(Globals::applyFilePath($member->details()->foto()->foto()));
//    }
//
//    /**
//     * @test
//     * @dataProvider getErrorGeneratingForms
//     */
//    public function new_member_form_is_posted_and_error_is_emitted($values, $files, $elementPath, $error)
//    {
//        $editedMember = $this->container->get('doctrine.orm.club_entity_manager')
//            ->getRepository('MembersBundle:Member')
//            ->findOneByEmailAddress(new EmailAddress('test01@test.pl'));
//
//        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_edit', ['id' => $editedMember->id()]));
//
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();
//
//        $form->setValues($values);
//
//        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);
//
//        $this->assertEquals(400, $this->getStatusCode());
//
//        $alert = $crawler->filter('div.alert.alert-danger');
//        $this->assertEquals('flash.member_editted.errors', trim($alert->text()));
//        $this->assertEquals($error, trim($crawler->filter($elementPath)->text()));
//    }
//
//    /**
//     * @test
//     * @dataProvider getErrorGeneratingForms
//     */
//    public function member_edit_form_is_posted_and_error_is_emitted($values, $files, $elementPath, $error)
//    {
//        $crawler = $this->client->request('GET', $this->container->get('router')->generate('gyman_member_new'));
//
//        $this->assertEquals(200, $this->getStatusCode());
//
//        $form = $crawler->filter('form[name="gyman_member_form"]')->first()->form();
//
//        $form->setValues($values);
//
//        $crawler = $this->client->request($form->getMethod(), $form->getUri(), $form->getPhpValues(), $files);
//
//        $this->assertEquals(400, $this->getStatusCode());
//
//        $alert = $crawler->filter('div.alert.alert-danger');
//        $this->assertEquals('flash.member_added.errors', trim($alert->text()));
//        $this->assertEquals($error, trim($crawler->filter($elementPath)->text()));
//    }
//
//    public function getErrorGeneratingForms()
//    {
//        $correctData = [
//            'gyman_member_form[firstname]' => 'Andrzej',
//            'gyman_member_form[lastname]'  => 'Kaszuba',
//            'gyman_member_form[birthdate]' => '18.01.1955',
//            'gyman_member_form[gender]'    => 'male',
//            'gyman_member_form[zipcode]'   => '81-353',
//            'gyman_member_form[phone]'     => '600 000 000',
//            'gyman_member_form[email]'     => 'andrzej@gazeta.pl',
//            'gyman_member_form[barcode]'   => '123456789',
//            'gyman_member_form[belt]'      => 'white',
//            'gyman_member_form[notes]'     => 'some admin notes',
//        ];
//
//        $files = [
//            'gyman_member_form' => [
//                'foto' => new UploadedFile(
//                    '/tmp/foto.jpg',
//                    'someTestFile.jpg',
//                    'image/jpeg',
//                    123
//                ),
//            ],
//        ];
//
//        return [
//            'empty firstname' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[firstname]' => null,
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(1) .controls .help-block',
//                'error'       => 'Pole nie może być puste!',
//            ],
//            'empty lastname' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[lastname]' => null,
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(2) .controls .help-block',
//                'error'       => 'Pole nie może być puste!',
//            ],
//            'empty email' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[email]' => null,
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
//                'error'       => 'Pole nie może być puste!',
//            ],
//            'empty file' => [
//                'values'      => $correctData,
//                'files'       => ['gyman_member_form' => ['foto' => null]],
//                'elementPath' => '#filePane div.control-group.error .help-block',
//                'error'       => 'Pole nie może być puste!',
//            ],
//            'wrong email' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[email]' => 'errornous-address',
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
//                'error'       => "Adres '{{ value }}' nie jest poprawny.",
//            ],
//            'existing email' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[email]' => 'test01@test.pl',
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(7) .controls .help-block',
//                'error'       => 'Ten email jest już zarejestrowany',
//            ],
//            'existing barcode' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[barcode]' => 'abcd12301',
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#additionalsPane div.control-group.error:nth-child(1) .controls .help-block',
//                'error'       => 'Ten kod jest już zarejestrowany',
//            ],
//            'wrong zipcode' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[zipcode]' => 'XYZTAAA',
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(5) .controls .help-block',
//                'error'       => "This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.\n            Kod pocztowy musi być w formacie XX-XXX",
//            ],
//            'wrong birthdate' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[birthdate]' => '2015-01-01',
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
//                'error'       => 'This value is not valid.',
//            ],
//            'too late birthdate' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[birthdate]' => (new \DateTime('+1 day'))->format('d.m.Y'),
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
//                'error'       => 'Data powinna być przed {{ limit }}.',
//            ],
//            'too early birthdate' => [
//                'values' => array_merge(
//                    $correctData,
//                    [
//                        'gyman_member_form[birthdate]' => (new \DateTime('-100 years'))->format('d.m.Y'),
//                    ]
//                ),
//                'files'       => $files,
//                'elementPath' => '#detailsPane div.control-group.error:nth-child(3) .controls .help-block',
//                'error'       => 'Data powinna być po {{ limit }}.',
//            ],
//        ];
//    }
}
