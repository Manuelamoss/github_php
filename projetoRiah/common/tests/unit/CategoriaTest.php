<?php namespace common\tests;

use common\models\categoria;

class CategoriaTest extends \Codeception\Test\Unit
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
    public function testValidation()
    {
        $categoria = new categoria();

        $categoria->nome = "nome da categoria super mega extenso";
        $this->assertFalse($categoria->validate(['nome']));
    }
    //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
    public function testNewCategoriaDB()
    {
        $test = new categoria();
        $test->nome = "testeCategoria";
        $test->save();
        $this->tester->seeInDatabase('categoria', ['nome' => 'testeCategoria']);
    }
    //aplicar um update e Ver se o registo atualizado se encontra na BD
    public function testUpdate()
    {
        $id = $this->tester->grabRecord('common\models\categoria', ['nome' => 'testeCategoria']);
        $user = categoria::findOne($id);
        $user->nome = 'testeCategoriaUpdate';
        $user->update();
        $this->tester->seeRecord('common\models\categoria', ['nome' => 'testeCategoriaUpdate']);
    }
    //Apagar o registo e Verificar que o registo não se encontra na BD.
    public function testDelete()
    {
        $id = $this->tester->grabRecord('common\models\categoria', ['nome' => 'testeCategoriaUpdate']);
        $user = categoria::findOne($id);
        $user->delete();
        $this->tester->dontSeeRecord('common\models\categoria', ['nome' => 'testeCategoriaUpdate']);
    }
}