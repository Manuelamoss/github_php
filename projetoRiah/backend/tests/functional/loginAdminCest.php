<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use common\models\User;

class loginAdminCest
{
    protected $tester;
    protected $user;

    public function _before()
    {
        $this->user = new User();
        $this->user->username = "testeUser";
        $this->user->email = "teste@user.com";
        $this->user->generateAuthKey();
        $this->user->setPassword("123teste");
        $this->user->generatePasswordResetToken();
        $this->user->save();
    }

    // tests
    public function NoAdminTest(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('Username',  $this->user->username);
        $I->fillField('Password', '123teste');
        $I->click('login-button');
        $I->cantSee('Logout');
        $this->user->delete();
    }
    public function AdminTest(FunctionalTester $I)
    {
        $this->user->status = 5;
        $this->user->update();
        $I->amOnPage('/');
        $I->fillField('Username',  $this->user->username);
        $I->fillField('Password', '123teste');
        $I->click('login-button');
        $I->See('Logout');
        $this->user->delete();
    }
}
