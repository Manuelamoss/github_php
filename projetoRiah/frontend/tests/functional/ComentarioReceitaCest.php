<?php namespace frontend\tests\functional;

use common\models\Comentario;
use frontend\tests\FunctionalTester;

class ComentarioReceitaCest
{
    public function _before(FunctionalTester $I)
    {
        Comentario::deleteAll();
    }

    // tests
    public function comentarReceitaTest(FunctionalTester $I)
    {
        $I->amLoggedInAs('1');
        $I->amOnPage('receita/view?id=24');
        $I->click('Comentar');
        $I->fillField('Comentario[descricao]', 'teste bom');
        $I->click('Salvar');
        $I->seeRecord('common\models\comentario', ['descricao' => 'teste bom']);
    }
}
