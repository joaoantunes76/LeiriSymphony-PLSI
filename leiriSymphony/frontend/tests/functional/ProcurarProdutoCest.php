<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class ProcurarProdutoCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // test
    public function tryProcurarProduto(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see("Recentemente adicionados");
        $I->click('', '#search_1');
        $I->fillField('#search_input', 'Yamaha Guitarra Clássica');
        $I->click('', '#submitsearchform');
        $I->see('Marcas');
        $I->see('Yamaha Guitarra Clássica');
    }

    public function tryNavFilter(FunctionalTester $I){
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->seeLink('Teclas');
        $I->click('Teclas');
        $I->cantSee('Yamaha Guitarra Clássica');
        $I->seeLink('Guitarras');
        $I->click('Guitarras');
        $I->see('Yamaha Guitarra Clássica');
    }
}
