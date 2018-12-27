<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class ReceitaCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function pesquisaReceitaTest(FunctionalTester $I)
    {
        $I -> amOnPage('receita/index');
        $I -> fillField('ReceitaSearch[descricao_preparo]','queijo');
        $I -> selectOption('ReceitaSearch[tempo_preparo]','8 minutos');
        $I->click('Pesquisar');
        $I->dontSee('Cheescake');
    }

}
