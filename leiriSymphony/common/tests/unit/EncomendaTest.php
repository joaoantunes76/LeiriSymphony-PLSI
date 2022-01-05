<?php
namespace common\tests;

use backend\controllers\EncomendasController;
use common\models\Encomendas;
use common\models\Encomendasprodutos;
use http\Exception;

class EncomendaTest extends \Codeception\Test\Unit
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

    //tests
    /*
     * Encomendas
     */
    public function testEncomendaPerfilInexistenteNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 98989898; //perfil inexistente
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaPerfilNuloNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = null; //perfil nulo
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaEstadoErradoNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'aaaaa'; //valor do estado tem de fazer parte do Enum
        $encomenda->pago = 0;
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaCampoPagoErradoNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 3; //valor de 'pago' só pode ser 0('não pago') ou 1('pago')
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaPrecoNegativoNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = -90;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaTipoExpedicaoErradoNaoValida()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'aaaaaaa';
        $encomenda->data = date('Y-m-d');

        $this->assertFalse($encomenda->validate());
    }

    public function testEncomendaSave()
    {
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = 300.9;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');

        $this->assertTrue($encomenda->save());
    }

    public function testVerEncomendaAdicionada()
    {
        $this->tester->seeInDatabase(Encomendas::tableName(), ['preco' => 300.9]);
    }

    public function testAtualizarEncomendaRegistada()
    {
        $encomenda = Encomendas::find()->where(['preco' => 300.9])->one();
        $encomenda->pago = 1;

        $this->assertTrue($encomenda->save());
    }

    public function testVerEncomendaAnteriormenteAtualizada()
    {
        $this->tester->seeInDatabase(Encomendas::tableName(), ['preco' => 300.9, 'pago' => 1]);
    }

    public function testApagarEncomenda()
    {
        $encomenda = Encomendas::find()->where(['preco' => 300.9])->one();
        $this->assertIsNumeric($encomenda->delete());
    }

    public function testVerSeEncomendaFoiApagada()
    {
        $this->tester->dontSeeInDatabase(Encomendas::tableName(), ['preco' => 300.9]);
    }

    /*
     * Relação Encomendas - Produtos
     */
    public function testRelacaoEncomendaprodutoIdEncomendaInexistenteNaoValida()
    {
        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = 12212; //encomenda inexistente
        $encomendaproduto->idproduto = 2;
        $encomendaproduto->quantidade = 2;

        $this->assertFalse($encomendaproduto->validate());
    }

    public function testRelacaoEncomendaprodutoIdEncomendaNuloNaoValida()
    {
        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = null; //encomenda nula
        $encomendaproduto->idproduto = 2;
        $encomendaproduto->quantidade = 2;

        $this->assertFalse($encomendaproduto->validate());
    }

    public function testRelacaoEncomendaprodutoIdProdutoInexistenteNaoValida()
    {
        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = 5;
        $encomendaproduto->idproduto = 909090; //produto inexistente
        $encomendaproduto->quantidade = 2;

        try {
            $encomendaproduto->validate();
        } catch (\Exception $exception){
            $gotError = true;
        }
        $this->assertTrue($gotError);
    }

    public function testRelacaoEncomendaprodutoIdProdutoNuloNaoValida()
    {
        //encomenda de teste
        $encomenda = new Encomendas();
        $encomenda->idperfil = 4;
        $encomenda->estado = 'Em Processamento';
        $encomenda->pago = 0;
        $encomenda->preco = 256;
        $encomenda->tipoexpedicao = 'Levantamento em loja';
        $encomenda->data = date('Y-m-d');
        $encomenda->save();
        $encomendaId = $encomenda->id;

        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = $encomendaId;
        $encomendaproduto->idproduto = null; //produto nulo
        $encomendaproduto->quantidade = 2;

        try {
            $encomendaproduto->validate();
        } catch (\Exception $exception){
            $gotError = true;
        }
        $this->assertTrue($gotError);
    }

    public function testQuantidadeEncomendaMaiorQueStockProdutoNaoValida()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = $encomendaId;
        $encomendaproduto->idproduto = 1;
        $encomendaproduto->quantidade = 50; //quantidade não pode ser superior ao stock do produto(25)

        $this->assertFalse($encomendaproduto->validate());
    }

    public function testQuantidadeEncomendaNulaNaoValida()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = $encomendaId;
        $encomendaproduto->idproduto = 1;
        $encomendaproduto->quantidade = null; //quantidade nula

        $this->assertFalse($encomendaproduto->validate());
    }

    public function testQuantidadeEncomendaNegativaNaoValida()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = $encomendaId;
        $encomendaproduto->idproduto = 1;
        $encomendaproduto->quantidade = -9; //quantidade negativa

        $this->assertFalse($encomendaproduto->validate());
    }

    public function testRelacaoEncomendaprodutoSave()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = new Encomendasprodutos();
        $encomendaproduto->idencomenda = $encomendaId;
        $encomendaproduto->idproduto = 1;
        $encomendaproduto->quantidade = 2;

        $this->assertTrue($encomendaproduto->save());
    }

    public function testVerRelacaoEncomendaprodutoAdicionada()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $this->tester->seeInDatabase(Encomendasprodutos::tableName(), ['idencomenda' => $encomendaId, 'idproduto' => 1]);
    }

    public function testAtualizarRelacaoEncomendaprodutoRegistada()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = Encomendasprodutos::find()->where(['idencomenda' => $encomendaId, 'idproduto' => 1])->one();
        $encomendaproduto->quantidade = 6;

        $this->assertTrue($encomendaproduto->save());
    }

    public function testVerRelacaoEncomendaprodutoAnteriormenteAtualizada()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;
        $this->tester->seeInDatabase(Encomendasprodutos::tableName(), ['idencomenda' => $encomendaId, 'idproduto' => 1, 'quantidade' => 6]);
    }

    public function testApagarRelacaoEncomendaproduto()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;

        $encomendaproduto = Encomendasprodutos::find()->where(['idencomenda' => $encomendaId, 'idproduto' => 1])->one();
        $this->assertIsNumeric($encomendaproduto->delete());
    }

    public function testVerificarSeRelacaoEncomendaprodutoFoiApagada()
    {
        $encomendaId = Encomendas::find()->where(['preco' => 256])->one()->id;
        $this->tester->dontSeeInDatabase(Encomendasprodutos::tableName(), ['idencomenda' => $encomendaId, 'idproduto' => 1]);

        $encomendateste = Encomendas::find()->where(['id' => $encomendaId])->one();
        $encomendateste->delete();
    }
}