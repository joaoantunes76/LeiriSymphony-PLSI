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
        $I->fillField('#search_input', 'Guitarra Clássica Yamaha C40II');
        $I->click('', '#submitsearchform');
        $I->see('Marcas');
        $I->see('Guitarra Clássica Yamaha C40II');
    }

    public function tryNavFilter(FunctionalTester $I){
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->seeLink('Teclas');
        $I->click('Teclas');
        $I->cantSee('Guitarra Clássica Yamaha C40II');
        $I->seeLink('Guitarras');
        $I->click('Guitarras');
        $I->see('Guitarra Clássica Yamaha C40II');
    }
}
