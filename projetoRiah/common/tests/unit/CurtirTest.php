<?php namespace common\tests;

use common\models\Curtidas;

class CurtirTest extends \Codeception\Test\Unit
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
        $test = new Curtidas();

        $test->status = null;
        $this->assertNotNull($test->validate(['id_receita']));

        $test->status = 'like';
        $this->assertFalse($test->validate(['status']));
    }
    //Criar um registo válido e guardar na BD e Ver se o registo válido se encontra na BD
    public function testNewCurtidaDB()
    {
        $test = new Curtidas();
        $test->id_receita = 2;
        $test->id_user = 1;
        $test->status = 1;
        $test->save();
        $this->tester->seeInDatabase('curtidas', ['id_receita' => 2,'id_user'=>1]);
    }
    //aplicar um update e Ver se o registo atualizado se encontra na BD
    public function testUpdate()
    {
        $id = $this->tester->grabRecord('common\models\Curtidas', ['id_user'=>1]);
        $user = Curtidas::findOne($id);
        $user->status = 1;
        $user->update();
        $this->tester->seeRecord('common\models\Curtidas', ['id_user' => 1,'status'=> 1]);
    }
    //Apagar o registo e Verificar que o registo não se encontra na BD.
    public function testDelete()
    {
        $id = $this->tester->grabRecord('common\models\Curtidas', ['id_user'=>1]);
        $user = Curtidas::findOne($id);
        $user->delete();
        $this->tester->dontSeeRecord('common\models\Curtidas', ['id_user'=>1]);
    }
}