<?php namespace common\tests;

use backend\models\UserSearch;
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
    /*public function testValidation()
    {
        $user = new User();

        $user->username = '';
        $this->assertFalse($user->validate(['username']));

        //$user->username ='toolooooonpppppppppppppppppppppppppppptoolooooonppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppgnaaaaaaameeeeppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppppgnaaaaaaameeee';
        //$this->assertFalse($user->validate(['username']));

        //$user->username = 'davert';
        //$this->assertTrue($user->validate(['username']));
    }*/

    //Criar um registo válido e guardar na BD
    /*public function testNewUserDB(){
        $test= new User();
        $test->username= "testeUser";
        $test->email="teste@user.com";
        $test->generateAuthKey();
        $test->setPassword("123teste");
        $test->generatePasswordResetToken();
        $test->save();
        $this->tester->seeInDatabase('user',['username'=>'testeUser','email'=>"teste@user.com"]);

    }*/

    //Ver se o registo válido se encontra na BD
    public function testCheckDB(){
        $this->tester->seeInDatabase('user',['username'=>'testeUser']);
    }
}