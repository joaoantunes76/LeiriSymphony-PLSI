<?php
namespace common\tests;

use common\models\Albuns;
use common\models\Artistas;

class AlbumTest extends \Codeception\Test\Unit
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
    public function testAlbumNomeNumeroInteiroNaoValida()
    {
        $album = new Albuns();
        $album->nome = 5; //nome tem de ser string
        $album->preco = 15.98;
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 34;

        $this->assertFalse($album->validate());
    }

    public function testAlbumPrecoStringNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 'aaaa'; //o preço tem de ser um número
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 34;

        $this->assertFalse($album->validate());
    }

    public function testAlbumPrecoNegativoNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = -16; //o preço tem de ser um número acima ou igual a 0
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 34;

        $this->assertFalse($album->validate());
    }

    public function testAlbumDataLancamentoFormatoErradoNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 15.98;
        $album->datalancamento = '12/7/2021'; //a data tem de estar no formato certo
        $album->idimagem = 34;

        $this->assertFalse($album->validate());
    }

    public function testAlbumImagemInexistenteNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 15.98;
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 56565; //esta imagem não existe

        $this->assertFalse($album->validate());
    }

    public function testAlbumImagemNulaNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 15.98;
        $album->datalancamento = '2021-07-12';
        $album->idimagem = null; //imagem nula

        $this->assertFalse($album->validate());
    }

    public function testAlbumSave()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 15.98;
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 34;

        $this->assertTrue($album->save());
    }

    public function testVerAlbumAdicionado()
    {
        $this->tester->seeInDatabase(Albuns::tableName(), ['nome' => 'O monstro precisa de amigos']);
    }

    public function testAlterarAlbumRegistado()
    {
        $album = Albuns::find()->where(['nome' => 'O monstro precisa de amigos'])->one();
        $album->preco = 11;

        $this->assertTrue($album->save());
    }

    public function testVerificarAlbumAlterado()
    {
        $this->tester->seeInDatabase(Albuns::tableName(), ['nome' => 'O monstro precisa de amigos', 'preco' => 11]);
    }

    public function testEliminarAlbum()
    {
        $album = Albuns::find()->where(['nome' => 'O monstro precisa de amigos'])->one();
        $this->assertIsNumeric($album->delete());
    }

    public function testVerSeAlbumFoiApagado()
    {
        $this->tester->dontSeeInDatabase(Albuns::tableName(), ['nome' => 'O monstro precisa de amigos', 'preco' => 11]);
    }

    public function testArtistaNomeNumeroInteiroNaoValida()
    {
        $artista = new Artistas();
        $artista->nome = 23; //o nome do artista tem de ser string

        $this->assertFalse($artista->validate());
    }

    public function testArtistaNomeComTamanhoExcedidoNaoValida()
    {
        $chars = "";
        for($i = 0; $i < 50; $i++){
            $chars .= "a";
        }
        $artista = new Artistas();
        $artista->nome = $chars; //o nome do artista não pode exceder os 45 caracteres

        $this->assertFalse($artista->validate());
    }

    public function testArtistaSave()
    {
        $artista = new Artistas();
        $artista->nome = 'Rui Veloso';

        $this->assertTrue($artista->save());
    }

    public function testVerArtistaAdicionado()
    {
        $this->tester->seeInDatabase(Artistas::tableName(), ['nome' => 'Rui Veloso']);
    }

    

}