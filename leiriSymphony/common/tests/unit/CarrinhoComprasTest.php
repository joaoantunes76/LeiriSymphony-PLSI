<?php
namespace common\tests;

use common\models\Carrinho;
use common\models\Categorias;
use common\models\Marcas;
use common\models\Produtos;
use common\models\Subcategorias;

class CarrinhoComprasTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testCarrinhoProdutoIdNaoExistenteNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 10000; //id não existente
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = 1;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoProdutoIdNaoNumericoNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = "foo";
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = 1;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoProdutoIdNullNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = null;
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = 1;
        $this->assertFalse($carrinho->validate());
    }


    // tests
    public function testCarrinhoPerfilIdNaoNumericoNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = null;
        $carrinho->idperfil = "foo"; //id do perfil (Cliente)
        $carrinho->quantidade = 1;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoPerfilNaoExistenteNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 10000; //id não existente
        $carrinho->quantidade = 1;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoPerfilNullNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = null;
        $carrinho->quantidade = null;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoQuantidadeNãoNumericaNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = "foo";
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoQuantidadeNullNaoValida()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = null;
        $this->assertFalse($carrinho->validate());
    }

    // tests
    public function testCarrinhoValido()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 3; //id do perfil (Apoio) - Não vai ser usado na criação de teste
        $carrinho->quantidade = 1;

        $this->assertTrue($carrinho->validate());
    }

    public function testCarrinhoSave()
    {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = 1;
        $this->assertTrue($carrinho->save());
    }

    public function testVerCarrinhoAdicionado()
    {
        $this->tester->seeInDatabase(Carrinho::tableName(), ['idproduto' => 7, 'idperfil' => 4]);
    }

    public function testCarrinhoRepetidoNaoPodeSalvar() {
        $carrinho = new Carrinho();
        $carrinho->idproduto = 7;
        $carrinho->idperfil = 4; //id do perfil (Cliente)
        $carrinho->quantidade = 2;
        $this->assertFalse($carrinho->save());
    }

    public function testCarrinhoAdicionadoAtualiza(){
        $carrinho = Carrinho::find()->where(['idproduto' => 7])->andWhere(['idperfil' => 4])->one();
        $carrinho->quantidade = 10;
        $this->assertTrue($carrinho->save());
    }

    public function testVerCarrinhoAtualizado(){
        $this->tester->seeInDatabase(Carrinho::tableName(), ['idproduto' => 7, 'idperfil' => 4, 'quantidade' => 10]);
    }

    public function testApagarCarrinho(){
        $carrinho = Carrinho::find()->where(['idproduto' => 7])->andWhere(['idperfil' => 4])->one();
        $this->assertIsNumeric($carrinho->delete());
    }

    public function testNaoVerCarrinhoApagado(){
        $this->tester->dontSeeInDatabase(Carrinho::tableName(), ['idproduto' => 7, 'idperfil' => 4]);
    }
}
