<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class LoginPageCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function loginPageTest(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Login');
        $I->fillField('Username', 'manuela');
        $I->fillField('Password', '123teste');
        $I->click('login-button');

        $I->see('AVENTURA');
    }
}
