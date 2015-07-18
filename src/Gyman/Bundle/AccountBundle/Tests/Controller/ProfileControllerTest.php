<?php

namespace Gyman\Bundle\AccountBundle\Tests\Controller;

use Gyman\Bundle\TestBundle\Tests\BaseTest;

class ProfileControllerTest extends BaseTest
{
    public function testOrdersPage()
    {
        $this->fixturesAreLoaded();
        $this->clientIsSettedUp();
        $this->userIsLoggedIn('uirapuru', '123');
        $this->getPage('/profile/orders');

        $this->assertPageContainsText('orders.title.caption');
    }

    public function testInvoicesPage()
    {
        $this->fixturesAreLoaded();
        $this->clientIsSettedUp();
        $this->userIsLoggedIn('uirapuru', '123');
        $this->getPage('/profile/invoices');

        $this->assertPageContainsText('invoices.title.caption');
    }

    /**
     * @dataProvider testUpdateProfileDataProvider
     * @param type $firstname
     * @param type $lastname
     * @param type $newPass
     * @param type $newPassRepeat
     * @param type $message
     * @param type $code
     */
    public function testUpdateProfile($firstname, $lastname, $newPass, $newPassRepeat, $message, $code)
    {
        $this->fixturesAreLoaded();
        $this->clientIsSettedUp();
        $this->userIsLoggedIn('uirapuru', '123');

        $form = $this->crawler->filter('button:contains("profile.dashboard.form.label.button_save")')->form();

        $form['fos_user_profile_form[firstname]'] = $firstname;
        $form['fos_user_profile_form[lastname]'] = $lastname;
        $form['fos_user_profile_form[plainPassword][first]'] = $newPass;
        $form['fos_user_profile_form[plainPassword][second]'] = $newPassRepeat;

        $this->crawler = $this->client->submit($form);

        $this->assertPageContainsText($message);
        $this->assertPageResponseCode($code);
    }

    public function testUpdateProfileDb()
    {
        $this->fixturesAreLoaded();
        $this->clientIsSettedUp();
        $this->userIsLoggedIn('uirapuru', '123');

        $form = $this->crawler->filter('button:contains("profile.dashboard.form.label.button_save")')->form();

        $uniqueFirstname = md5(microtime());
        $uniqueLastname = md5(microtime());

        $form['fos_user_profile_form[firstname]'] = $uniqueFirstname;
        $form['fos_user_profile_form[lastname]'] = $uniqueLastname;

        $this->crawler = $this->client->submit($form);

        $this->assertPageContainsText('user.notice.profile_updated_succesfuly');
        $this->assertPageResponseCode(200);

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $user = $entityManager->createQuery("SELECT u FROM Gyman\Bundle\AccountBundle\Entity\User u WHERE u.username = 'uirapuru'")->getResult();

        $this->assertEquals($uniqueFirstname, $user[0]->getFirstname());
        $this->assertEquals($uniqueLastname, $user[0]->getLastname());
    }

    public function testUpdateProfileDataProvider()
    {
        return [
            [
                'firstname'     => 'Grzegorz',
                'lastname'      => 'Kaszuba',
                'newPass'       => '123',
                'newPassRepeat' => '123',
                'message'       => 'user.notice.profile_updated_succesfuly',
                'code'          => 200,
            ],
            [
                'firstname'     => 'Grzegorz',
                'lastname'      => 'Kaszuba',
                'newPass'       => '123',
                'newPassRepeat' => '345',
                'message'       => 'fos_user.password.mismatch',
                'code'          => 200,
            ],
//            array(
//                "firstname"     => "",
//                "lastname"      => "Kaszuba",
//                "newPass"       => "123",
//                "newPassRepeat" => "123",
//                "message"       => "user.firstname.field_cannot_be_empty",
//                "code"          => 200,
//            ),
//            array(
//                "firstname"     => "Grzegorz",
//                "lastname"      => "",
//                "newPass"       => "123",
//                "newPassRepeat" => "123",
//                "message"       => "user.lastname.field_cannot_be_empty",
//                "code"          => 200,
//            ),
        ];
    }
}
