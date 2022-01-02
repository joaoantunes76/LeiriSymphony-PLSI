<?php
namespace common\tests;

use common\models\Pedidosdecontacto;

class PedidoContactoTest extends \Codeception\Test\Unit
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
    public function testPedidodecontactoIdproblemaNaoExistenteNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1000;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoIdproblemaNullNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = Null;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoEmailInvalidoNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailtestegmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoEmailMais64CharsNaoValida()
    {
        $chars = "";
        for($i = 0; $i<64; $i++){
            $chars .= "p";
        }

        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = $chars."@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoEmailNullNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = Null;
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoIdperfilNaoExistenteNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 1000;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoIdperfilNaoNumericoNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = "foo";
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoIdperfilNullNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = Null;
        $pedidocontacto->mensagem = "foo";
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoMensagemNullNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = Null;
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoMensagemNumericaNaoValida()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = 3;
        $this->assertFalse($pedidocontacto->validate());
    }

    public function testPedidodecontactoValido()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 3;
        $pedidocontacto->mensagem = "foo";
        $this->assertTrue($pedidocontacto->validate());
    }

    public function testPedidodecontactoValidoSalva()
    {
        $pedidocontacto = new Pedidosdecontacto();
        $pedidocontacto->idproblema = 1;
        $pedidocontacto->email = "emailteste@gmail.com";
        $pedidocontacto->idperfil = 4;
        $pedidocontacto->mensagem = "foo";
        $this->assertTrue($pedidocontacto->save());
    }

    public function testPedidodecontactoSalvadoEstaNaBD(){

        $this->tester->seeInDatabase(Pedidosdecontacto::tableName(), ['idproblema' => 1, 'email' => 'emailteste@gmail.com', 'idperfil' => 4, 'mensagem' => "foo"]);
    }

    public function testPedidodecontactoCriadoAtualiza()
    {
        $pedidocontacto = Pedidosdecontacto::find()->where(['idproblema' => 1, 'email' => 'emailteste@gmail.com', 'idperfil' => 4, 'mensagem' => "foo"])->one();
        $pedidocontacto->mensagem = "foo - edited";
        $this->assertTrue($pedidocontacto->save());
    }

    public function testPedidodecontactoAtualizadoEstaNaBD()
    {
        $this->tester->seeInDatabase(Pedidosdecontacto::tableName(), ['idproblema' => 1, 'email' => 'emailteste@gmail.com', 'idperfil' => 4, 'mensagem' => "foo - edited"]);
    }

    public function testPedidodecontactoAtualizadoApaga()
    {
        $pedidocontacto = Pedidosdecontacto::find()->where(['idproblema' => 1, 'email' => 'emailteste@gmail.com', 'idperfil' => 4, 'mensagem' => "foo - edited"])->one();
        $this->assertIsNumeric($pedidocontacto->delete());
    }

    public function testPedidodecontactoApagadoNaoEstaNaBD()
    {
        $this->tester->dontSeeInDatabase(Pedidosdecontacto::tableName(), ['idproblema' => 1, 'email' => 'emailteste@gmail.com', 'idperfil' => 4, 'mensagem' => "foo - edited"]);
    }
}
