<?php namespace common\tests;

use common\models\Receita;

class receitaTest extends \Codeception\Test\Unit
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

    // tests
    // Despoletar todas as regras de validação (introduzindo dados erróneos);
    public function testReceitaValidation()
    {
        $receita = new Receita();

        $receita->tempo_preparo = '';
        $this->assertFalse($receita->validate(['tempo_preparo']));

        $receita->descricao_preparo = '';
        $this->assertNotNull($receita->validate(['tempo_preparo']));

        $receita->nome ='bolo de chocolate com calda de morango';
        $this->assertFalse($receita->validate(['nome']));

        $receita->curtir = 'a';
        $this->assertFalse($receita->validate(['curtir']));
    }

    //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
    /*public function testNewReceitaDB()
    {
        $test = new Receita();
        $test->nome = "ReceitaTest";
        $test->tempo_preparo = "1 minuto";
        $test->descricao_preparo = " apenas um teste";
        $test->curtir = 0;
        $test->descurtir = 0;
        $test->id_categoria = 1;
        $test->save();
        $this->tester->seeInDatabase('receita', ['nome' => 'ReceitaTest']);
    }*/


    //aplicar um update e Ver se o registo atualizado se encontra na BD
    /*public function testUpdate()
    {
        $id = $this->tester->grabRecord('common\models\User', ['username' => 'testeUser']);
        $receita = Receita::findOne($id);
        $receita->username = 'testeUserUpdate';
        $receita->update();
        $this->tester->seeRecord('common\models\User', ['username' => 'testeUserUpdate']);
    }

    //Apagar o registo e Verificar que o registo não se encontra na BD.
    public function testDelete() {
        $id = $this->tester->grabRecord('common\models\User',['username'=>'testeUserUpdate']);
        $receita = Receita::findOne($id);
        $receita->delete();
        $this->tester->dontSeeRecord('common\models\User',['username'=>'testeUserUpdate']);
    }*/
}