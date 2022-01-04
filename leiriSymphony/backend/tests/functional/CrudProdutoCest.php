<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use \Codeception\Util\Locator;
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

    public function tryAdicionarERemoverImagem(FunctionalTester $I)
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
        $I->see("Piano Digital RSP20CR");
        $I->see('', Locator::href('/index-test.php/produtos/view?id=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/produtos/view?id=3"]']);
        $I->see("Piano Digital RSP20CR");
        //Adicionar uma Imagem ao Produto criado
        $I->seeLink('Adicionar Imagem');
        $I->click('Adicionar Imagem');
        $I->see("Adicionar Imagem");
        $I->submitForm('#add-imagem', [
            $I->attachFile('#uploadform-imagefile', 'piano_teste.jpg'),
        ]);
        $I->seeLink('Adicionar');
        $I->click('Adicionar');
        $I->see("Piano Digital RSP20CR");
    }

    public function tryAdicionarDemonstracao(FunctionalTester $I)
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
        $I->see("Piano Digital RSP20CR");
        $I->see('', Locator::href('/index-test.php/produtos/view?id=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/produtos/view?id=3"]']);
        $I->see("Piano Digital RSP20CR");
        //Adicionar uma Demonstração ao Produto criado
        $I->seeLink('Adicionar Demonstração');
        $I->click('Adicionar Demonstração');
        $I->see("Criar Demonstrações");
        $I->submitForm('#add-demo', [
            $I->attachFile('#uploadform-demofile', 'piano_teste.mp3'),
        ]);
        $I->click('Adicionar');
        $I->see("3");
        $I->seeLink('Ir para Produto');
        $I->click('Ir para Produto');
        $I->see("Piano Digital RSP20CR");
    }
}
