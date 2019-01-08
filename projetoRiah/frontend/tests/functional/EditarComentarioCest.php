<?php namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class EditarComentarioCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function EditarComentarioTest(FunctionalTester $I)
    {
        $I->amLoggedInAs('1');
        $I->amOnRoute('comentario/update',['id'=>1,'id_receita'=>1]);
        $I->fillField('Comentario[descricao]', 'teste bom agora sim');
        $I->click('Salvar');
        $I->seeRecord('common\models\comentario', ['descricao' => 'teste bom agora sim']);
    }
}
