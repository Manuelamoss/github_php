<?php namespace common\tests;

use common\models\User;

class userTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // Despoletar todas as regras de validação (introduzindo dados erróneos);
    public function testValidation()
    {
        $user = new User();

        $user->username = null;
        $this->assertNotNull($user->validate(['username']));

        $user->email = null;
        $this->assertNotNull($user->validate(['email']));
    }
    //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
    public function testNewUserDB()
    {
        $test = new User();
        $test->username = "testeUser";
        $test->email = "teste@user.com";
        $test->generateAuthKey();
        $test->setPassword("123teste");
        $test->generatePasswordResetToken();
        $test->save();
        $this->tester->seeInDatabase('user', ['username' => 'testeUser']);
    }
    //aplicar um update e Ver se o registo atualizado se encontra na BD
    public function testUpdate()
    {
        $id = $this->tester->grabRecord('common\models\User', ['username' => 'testeUser']);
        $user = User::findOne($id);
        $user->username = 'testeUserUpdate';
        $user->update();
        $this->tester->seeRecord('common\models\User', ['username' => 'testeUserUpdate']);
    }
    //Apagar o registo e Verificar que o registo não se encontra na BD.
    public function testDelete()
    {
        $id = $this->tester->grabRecord('common\models\User', ['username' => 'testeUserUpdate']);
        $user = User::findOne($id);
        $user->delete();
        $this->tester->dontSeeRecord('common\models\User', ['username' => 'testeUserUpdate']);
    }
}