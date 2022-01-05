<?php
namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
class RealizarCompraCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryComprarProduto(AcceptanceTester $I)
    {
        $I->maximizeWindow();
        $I->amOnPage(\Yii::$app->homeUrl);
        $I->see("Recentemente adicionados");
        //Fazer Login
        $I->seeLink('Login');
        $I->click('Login');
        $I->see("Bem vindo de volta!
Por favor, faça o login");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->see('Login');
        $I->click('Login' );
        $I->wait(1);
        $I->see("Recentemente adicionados");
        $I->moveMouseOver( '#navbarDropdown_1' );
        $I->seeLink('Guitarras');
        $I->click('Guitarras');
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->moveMouseOver( '.single_product_item' );
        $I->seeLink('', '/index-test.php/produtos/view?produtoId=1');
        $I->click(['xpath'=>'//a[@href="/index-test.php/produtos/view?produtoId=1"]']);
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->see('Stock: Disponivel');
        $I->click(['xpath'=>'//a[@href=" /index-test.php/produtos/adicionar-carrinho?idproduto=1"]']);
        $I->wait(1);
        $I->click(['xpath'=>'//button[@class="close"]']);
        $I->click(['xpath'=>'//i[@class="fas fa-cart-plus"]']);
        $I->see('Carrinho de compras');
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->seeLink('Comprar');
        $I->click('Comprar');
        $I->seeLink('Proximo');
        $I->click('Proximo');
        $I->click('Pagar');
        $I->see('Sucesso');
        $I->moveMouseOver( '#navbarDropdown_3' );
        $I->seeLink("Encomendas");
        $I->click("Encomendas");
        $I->see('Data: '.date('Y-m-d'));
        $I->wait(1);
        $I->see('Guitarra Clássica Yamaha C40II');
        $I->see('Detalhes');
    }
}
