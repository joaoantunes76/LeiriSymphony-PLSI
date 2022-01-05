<?php
namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;
class FazerCompraCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryComprarProduto(FunctionalTester $I)
    {
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see("Recentemente adicionados");
        //Fazer Login
        $I->seeLink('Login');
        $I->click('Login');
        $I->see("Bem vindo de volta!
Por favor, faça o login");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Login', '.btn_3');
        //Ir para pagina de perfil
        $I->see("Recentemente adicionados");
        $I->seeLink('Guitarras');
        $I->click('Guitarras');
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->seeLink('', '/produtos/view?produtoId=1');
        $I->amOnPage('/produtos/view?produtoId=1');
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->see('Stock: Disponivel');
        $I->seeLink('+ adicionar ao carrinho');
        $I->click('+ adicionar ao carrinho');
        $I->seeLink('', '/carrinho/index');
        $I->amOnPage('/carrinho/index');
        $I->see('Carrinho de compras');
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->seeLink('Comprar');
        $I->click('Comprar');
        $I->seeLink('Proximo');
        $I->click('Proximo');
        $I->click('Pagar');
        $I->see('Sucesso');
        $I->seeLink("Encomendas");
        $I->click("Encomendas");
        $I->see('Data: '.date('Y-m-d'));
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->see('Detalhes');
    }
}
