<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class loginAdminCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function NoAdminTest(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('Username', 'testeUtilizador');
        $I->fillField('Password', '123teste');
        $I->click('login-button');
        $I->cantSee('Logout');
    }

    public function AdminTest(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('Username', 'manuela');
        $I->fillField('Password', '123teste');
        $I->click('login-button');
        $I->See('Logout');

    }
}
