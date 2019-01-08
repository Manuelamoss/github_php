<?php namespace common\tests;

use common\models\Comentario;
use yii\validators\DateValidator;

class ComentarioTest extends \Codeception\Test\Unit
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
    public function testReceitaValidation()
    {
        $comentario = new Comentario();

        $comentario->descricao = '';
        $this->assertFalse($comentario->validate(['descricao']));

        $comentario->id_receita = '';
        $this->assertNotNull($comentario->validate(['id_receita']));
    }

    //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
    public function testNewReceitaDB()
    {
        $test = new Comentario();
        $test->descricao = "Novo comnetario";
        $test->id_receita = 2;
        $test->id_user = 1;
        $test->save();
        //$this->tester->seeInDatabase('receita', ['nome' => 'ReceitaTest']);
    }

    //aplicar um update e Ver se o registo atualizado se encontra na BD
    public function testUpdate()
    {
        $id = $this->tester->grabRecord('common\models\Comentario', ['id_receita' => 2]);
        $receita = Comentario::findOne($id);
        $receita->descricao = 'novo Comentario';
        $receita->update();
        $this->tester->seeRecord('common\models\Comentario', ['descricao' => 'novo Comentario']);
    }

    //Apagar o registo e Verificar que o registo não se encontra na BD.
    public function testDelete()
    {
        $id = $this->tester->grabRecord('common\models\Comentario', ['id_receita' => 2]);
        $receita = Comentario::findOne($id);
        $receita->delete();
        $this->tester->dontSeeRecord('common\models\Comentario', ['descricao' => 'novo Comentario']);
    }
}