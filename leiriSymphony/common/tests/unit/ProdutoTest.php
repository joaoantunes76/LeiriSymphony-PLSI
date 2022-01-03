<?php
namespace common\tests;

use common\models\Produtos;

class ProdutoTest extends \Codeception\Test\Unit
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
    public function testProdutoMarcaInexistenteNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 100000; //id de marca inexistente
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoMarcaNulaNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = null; //id de marca nulo
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoSubcategoriaInexistenteNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 900; //id de subcategoria inexistente
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoSubcategoriaNulaNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = null; //id de subcategoria nulo
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoNomeNumeroInteiroNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 111111111; //o nome tem de ser String
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoDescricaoNumeroInteiroNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 9090909; //descrição tem de ser String
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoUsadoStringNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 'aaaaa'; //o campo usado tem de ser do tipo tinyint
        $produto->preco = 150.2;
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoPrecoStringNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 'aaaaaa'; //O preço tem de ser um número
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoPrecoNegativoNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = -12; //O preço tem de ser um número acima de 0
        $produto->stock = 10;

        $this->assertFalse($produto->validate());
    }

    public function testProdutoStockStringNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 'aaaa'; //O stock tem de ser um número

        $this->assertFalse($produto->validate());
    }

    public function testProdutoStockNegativoNaoValida()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 6;
        $produto->idmarca = 3;
        $produto->nome = 'Guitarra Yamaha OA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = -9; //O stock tem de ser um número acima de 0

        $this->assertFalse($produto->validate());
    }

    public function testProdutoSave()
    {
        $produto = new Produtos();

        $produto->idsubcategoria = 1;
        $produto->idmarca = 1;
        $produto->nome = 'Guitarra Yamaha aaaaaOA765';
        $produto->descricao = 'Lorem Ipsum dolor, sit amet ';
        $produto->usado = 0;
        $produto->preco = 150.2;
        $produto->stock = 15;

        $this->assertTrue($produto->save());
    }

    public function testVerProdutoAdicionado()
    {
        $this->tester->seeInDatabase(Produtos::tableName(), ['nome' => 'Guitarra Yamaha aaaaaOA765']);
    }

    public function testAtualizarProdutoRegistado()
    {
        $produto = Produtos::find()->where(['nome' => 'Guitarra Yamaha aaaaaOA765'])->one();
        $produto->nome = 'Guitarra Yamaha ZZZZZ';

        $this->assertTrue($produto->save());
    }

    public function testVerProdutoAnteriormenteAtualizado()
    {
        $this->tester->seeInDatabase(Produtos::tableName(), ['nome' => 'Guitarra Yamaha ZZZZZ']);
    }

    public function testApagarProduto()
    {
        $produto = Produtos::find()->where(['nome' => 'Guitarra Yamaha ZZZZZ'])->one();
        $this->assertIsNumeric($produto->delete());
    }

    public function testVerSeProdutoFoiApagado()
    {
        $this->tester->dontSeeInDatabase(Produtos::tableName(), ['nome' => 'Guitarra Yamaha ZZZZZ']);
    }
}
