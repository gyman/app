<?php

namespace Gyman\Bundle\AccountBundle\Tests\Controller;

use Gyman\Bundle\TestBundle\Tests\BaseTest;

class UserAccountTest extends BaseTest
{
    public function testLogin()
    {
        $this->clientIsSettedUp();
        $this->fixturesAreLoaded();

        $this->getPage('/login');
        $this->assertPageResponseCode(200);

        $this->loginFormWasSubmitted('uirapuru', '1234');
        $this->assertPageContainsText('Bad credentials');

        $this->loginFormWasSubmitted('uirapuru123', '1234');
        $this->assertPageContainsText('Bad credentials');

        $this->loginFormWasSubmitted('uirapuru', '123');
        $this->assertPageResponseCode(200);
    }
    public function testRegister()
    {
        $this->clientIsSettedUp();
        $this->fixturesAreLoaded();

        $this->getPage('/register/monthly');
        $this->assertPageResponseCode(200);

        $this->registerFormWasSubmitted('uirapuru345', '123', '123', 'uirapuru345@tlen.pl');
        $this->assertPageResponseCode(200);
        $this->assertPageContainsText('account.title.caption');
    }

    /**
     * @dataProvider testRegisterDataProvider
     */
    public function testRegisterErrors($username, $password1, $password2, $email, $notice)
    {
        $this->clientIsSettedUp();
        $this->fixturesAreLoaded();

        $this->getPage('/register/monthly');
        $this->assertPageResponseCode(200);

        $this->registerFormWasSubmitted($username, $password1, $password2, $email);
        $this->assertPageContainsText($notice);
    }

    public function testResetPassword()
    {
        $this->clientIsSettedUp();
        $this->fixturesAreLoaded();

        $this->getPage('/resetting/request');
        $this->assertPageResponseCode(200);

        $this->resettingFormWasSubmitted('uirapuru');
        $this->assertPageResponseCode(200);
        $this->assertPageContainsText('resetting.check_email');

        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        $query = "SELECT u FROM Gyman\Bundle\AccountBundle\Entity\User u WHERE u.username = 'uirapuru'";
        $user = $entityManager->createQuery($query)->getSingleResult();

        $confirmationToken = $user->getConfirmationToken();

        $this->getPage('/resetting/reset/' . md5(time()));
        $this->assertPageResponseCode(404);

        $this->getPage('/resetting/reset/' . $confirmationToken);
        $this->assertPageResponseCode(200);

        $this->newPasswordFormWasSubmitted('123', 'abc');
        $this->assertPageResponseCode(200);
        $this->assertPageContainsText('fos_user.password.mismatch');

        $this->newPasswordFormWasSubmitted('123', '123');
        $this->assertPageResponseCode(200);
        $this->assertPageContainsText('user.notice.password_resetted_succesfuly');
    }

    public function testRegisterDataProvider()
    {
        return [
            [
                'username'  => 'uirapuru',
                'password1' => '123',
                'password2' => '123',
                'email'     => 'uirapuru123@tlen.pl',
                'notice'    => 'user.username_exists',
            ],
            [
                'username'  => 'uirapuru123',
                'password1' => '123',
                'password2' => '123',
                'email'     => 'uirapuruadg+gymanUirapuru@gmail.com',
                'notice'    => 'user.email_exists',
            ],
            [
                'username'  => 'uirapuru123',
                'password1' => '123',
                'password2' => '1234',
                'email'     => 'uirapuru123@tlen.pl',
                'notice'    => 'fos_user.password.mismatch',
            ],
        ];
    }

    private function registerFormWasSubmitted($username, $password1, $password2, $email)
    {
        $form = $this->crawler->filter('button:contains("account.register.label.submit")')->form();

        $form['dende_registration_form[username]'] = $username;
        $form['dende_registration_form[plainPassword][first]'] = $password1;
        $form['dende_registration_form[plainPassword][second]'] = $password2;
        $form['dende_registration_form[email]'] = $email;

        $this->crawler = $this->client->submit($form);
    }

    private function resettingFormWasSubmitted($username)
    {
        $form = $this->crawler->filter('button:contains("resetting.request.submit")')->form();

        $form['username'] = $username;

        $this->crawler = $this->client->submit($form);
    }

    private function newPasswordFormWasSubmitted($first, $second)
    {
        $form = $this->crawler->filter('button:contains("resetting.reset.submit")')->form();

        $form['fos_user_resetting_form[plainPassword][first]'] = $first;
        $form['fos_user_resetting_form[plainPassword][second]'] = $second;

        $this->crawler = $this->client->submit($form);
    }
}
