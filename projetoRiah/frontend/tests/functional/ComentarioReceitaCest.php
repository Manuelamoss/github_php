<?php namespace frontend\tests\functional;

use common\models\Comentario;
use frontend\tests\FunctionalTester;

class ComentarioReceitaCest
{

    public function _before(FunctionalTester $I)
    {
        //Comentario::deleteAll();
    }

    // tests

    public function comentarReceitaTest(FunctionalTester $I)
    {
        $I->amLoggedInAs('1');
        $I->amOnRoute('receita/view', ['id' => 1]);
        $I->click('Comentar','#buttonComment');
        $I->fillField('Comentario[descricao]', 'Muito bom');
        $I->click('Salvar');
        $I->seeRecord('common\models\comentario', ['descricao' => 'Muito bom']);
    }
}
