<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use Codeception\Util\Locator;
use common\models\Demonstracoes;

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
        $I->see("Piano Digital RSP20CR");
        //Remover uma imagem ao Produto criado
        $I->seeLink('Remover Imagem');
        $I->click('Remover Imagem');
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
        $I->seeLink('Ir para Produto');
        $I->click('Ir para Produto');
        $I->see("Piano Digital RSP20CR");
        //Remover a Demonstração adicionada anteriormente
        $id = Demonstracoes::find()->orderBy(['id' => SORT_DESC])->one()->id;
        $I->see('', Locator::href('/index-test.php/demonstracoes/delete?id='.$id.'&idproduto=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/demonstracoes/delete?id='.$id.'&idproduto=3"]']);
        $I->dontSee('', Locator::href('/index-test.php/demonstracoes/delete?id='.$id.'&idproduto=3'));
    }

    public function tryEditarProduto(FunctionalTester $I)
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
        //Ir para a página do Produto [produtos/view]
        $I->see("Piano Digital RSP20CR");
        $I->see('', Locator::href('/index-test.php/produtos/view?id=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/produtos/view?id=3"]']);
        $I->see("Piano Digital RSP20CR");
        //Editar Produto
        $I->seeLink('Atualizar');
        $I->click('Atualizar');
        $I->see("Editar Produto: Piano Digital RSP20CR");
        $I->seeInFormFields('.produtos-update', [
            'Produtos[idsubcategoria]' => 'Piano Digital',
            'Produtos[idmarca]' => 'Roland',
            'Produtos[nome]' => 'Piano Digital RSP20CR',
            'Produtos[descricao]' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'Produtos[usado]' => 'Não',
            'Produtos[preco]' => 799.00,
            'Produtos[stock]' => 40,
        ]);
        $I->submitForm('#create-produtos', [
            'Produtos[idsubcategoria]' => 'Piano',
            'Produtos[idmarca]' => 'Roland',
            'Produtos[nome]' => 'Piano RSP20CR',
            'Produtos[descricao]' => 'Lorem ipsum dolor sit amet, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'Produtos[usado]' => 'Não',
            'Produtos[preco]' => 460.50,
            'Produtos[stock]' => 10,
        ]);
        $I->see('Piano RSP20CR');
    }

    public function tryEliminarProduto(FunctionalTester $I)
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
        //Ir para a página do Produto [produtos/view]
        $I->see("Piano Digital RSP20CR");
        $I->see('', Locator::href('/index-test.php/produtos/view?id=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/produtos/view?id=3"]']);
        $I->see("Piano Digital RSP20CR");
        //Remover uma imagem ao Produto
        $I->seeLink('Remover Imagem');
        $I->click('Remover Imagem');
        //Remover a demonstração do Produto
        $I->see('', Locator::href('/index-test.php/demonstracoes/delete?id=1&idproduto=3'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/demonstracoes/delete?id=1&idproduto=3"]']);
        $I->dontSee('', Locator::href('/index-test.php/demonstracoes/delete?id=1&idproduto=3'));
        //Eliminar o Produto
        $I->seeLink('Eliminar');
        $I->click('Eliminar');
        $I->see("Produtos");
    }
}
