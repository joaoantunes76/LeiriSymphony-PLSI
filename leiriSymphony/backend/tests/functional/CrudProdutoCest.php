<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
class CrudProdutoCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryAdicionarProduto(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos produtos [produtos/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Produtos');
        $I->click('Produtos');
        $I->see("Produtos");
        //Criar um novo Produto
        $I->seeLink('Criar Produtos');
        $I->click('Criar Produtos');
        $I->see("Criar Produtos");
        $I->submitForm('#create-produtos', [
            'Produtos[idsubcategoria]' => 'Baixos',
            'Produtos[idmarca]' => 'Yamaha',
            'Produtos[nome]' => 'Baixo Yamaha GL87',
            'Produtos[descricao]' => 'Lorem Ipsum dolor, sit amet',
            'Produtos[usado]' => 'Não',
            'Produtos[preco]' => 230.7,
            'Produtos[stock]' => 15,
        ]);
        $I->click('Guardar');
        $I->see('Baixo Yamaha GL87');
    }
}
