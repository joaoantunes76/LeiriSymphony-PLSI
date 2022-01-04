<?php
namespace common\tests;

use common\models\Albuns;
use common\models\Albunsartistas;
use common\models\Artistas;
use common\models\Musicas;

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
    /*
     * Albuns
     */
    public function testAlbumNomeNumeroInteiroNaoValida()
    {
        $album = new Albuns();
        $album->nome = 5; //nome tem de ser string
        $album->preco = 15.98;
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 4;

        $this->assertFalse($album->validate());
    }

    public function testAlbumPrecoStringNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 'aaaa'; //o preço tem de ser um número
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 4;

        $this->assertFalse($album->validate());
    }

    public function testAlbumPrecoNegativoNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = -16; //o preço tem de ser um número acima ou igual a 0
        $album->datalancamento = '2021-07-12';
        $album->idimagem = 4;

        $this->assertFalse($album->validate());
    }

    public function testAlbumDataLancamentoFormatoErradoNaoValida()
    {
        $album = new Albuns();
        $album->nome = 'O monstro precisa de amigos';
        $album->preco = 15.98;
        $album->datalancamento = '12/7/2021'; //a data tem de estar no formato certo
        $album->idimagem = 4;

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
        $album->idimagem = 4;

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

    public function testVerificarSeAlbumFoiApagado()
    {
        $this->tester->dontSeeInDatabase(Albuns::tableName(), ['nome' => 'O monstro precisa de amigos', 'preco' => 11]);
    }

    /*
     * Artistas
     */
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

    public function testAlterarArtistaRegistado()
    {
        $artista = Artistas::find()->where(['nome' => 'Rui Veloso'])->one();
        $artista->nome = 'João Pedro Pais';

        $this->assertTrue($artista->save());
    }

    public function testVerificarArtistaAlterado()
    {
        $this->tester->seeInDatabase(Artistas::tableName(), ['nome' => 'João Pedro Pais']);
    }

    public function testEliminarArtista()
    {
        $artista = Artistas::find()->where(['nome' => 'João Pedro Pais'])->one();
        $this->assertIsNumeric($artista->delete());
    }

    public function testVerificarSeArtistaFoiApagado()
    {
        $this->tester->dontSeeInDatabase(Artistas::tableName(), ['nome' => 'João Pedro Pais']);
    }

    /*
     * Albunsartistas
     */
    public function testRelacaoAlbunsartistasIdAlbumInexistenteNaoValida()
    {
        $albumartista = new Albunsartistas();
        $albumartista->idalbum = 123124; //album inexistente
        $albumartista->idartista = 1;

        $this->assertFalse($albumartista->validate());
    }

    public function testRelacaoAlbunsartistasIdAlbumNuloNaoValida()
    {
        $albumartista = new Albunsartistas();
        $albumartista->idalbum = null; //album não pode ser nulo
        $albumartista->idartista = 1;

        $this->assertFalse($albumartista->validate());
    }

    public function testRelacaoAlbunsartistasIdArtistaInexistenteNaoValida()
    {
        $albumartista = new Albunsartistas();
        $albumartista->idalbum = 1;
        $albumartista->idartista = 333333; //artista inexistente

        $this->assertFalse($albumartista->validate());
    }

    public function testRelacaoAlbunsartistasIdArtistaNuloNaoValida()
    {
        $albumartista = new Albunsartistas();
        $albumartista->idalbum = 1;
        $albumartista->idartista = null; //artista inexistente

        $this->assertFalse($albumartista->validate());
    }

    public function testRelacaoAlbunsartistasSave()
    {
        //criação de artista teste
        $artista = new Artistas();
        $artista->nome = 'Rui Veloso';
        $artista->save();
        $artistaId = $artista->id;

        $albumartista = new Albunsartistas();
        $albumartista->idalbum = 1;
        $albumartista->idartista = $artistaId;

        $this->assertTrue($albumartista->save());
    }

    public function testVerRelacaoAlbumartistaAdicionado()
    {
        $artistaId = Artistas::find()->where(['nome' => 'Rui Veloso'])->one()->id;
        $this->tester->seeInDatabase(Albunsartistas::tableName(), ['idalbum' => 1, 'idartista' => $artistaId]);
    }

    public function testAlterarRelacaoAlbunartistaRegistada()
    {
        //criação de artista teste
        $artista = new Artistas();
        $artista->nome = 'João Pedro Pais';
        $artista->save();
        $artistaAtualizado = $artista->id;

        $artistaAnterior = Artistas::find()->where(['nome' => 'Rui Veloso'])->one()->id;

        $albumartista = Albunsartistas::find()->where(['idalbum' => 1, 'idartista' => $artistaAnterior])->one();
        $albumartista->idartista = $artistaAtualizado;
        $salvou = $albumartista->save();

        $this->assertTrue($salvou);
    }

    public function testVerificarRelacaoAlbunsartistasAlterada()
    {
        $artistaId = Artistas::find()->where(['nome' => 'João Pedro Pais'])->one()->id;
        $this->tester->seeInDatabase(Albunsartistas::tableName(), ['idalbum' => 1, 'idartista' => $artistaId]);
    }

    public function testEliminarRelacaoAlbumartista()
    {
        $artistaId = Artistas::find()->where(['nome' => 'João Pedro Pais'])->one()->id;
        $albumartista = Albunsartistas::find()->where(['idalbum' => 1, 'idartista' => $artistaId])->one();
        $this->assertIsNumeric($albumartista->delete());
    }

    public function testVerificarSeRelacaoAlbumartistaFoiApagada()
    {
        $artistaId = Artistas::find()->where(['nome' => 'João Pedro Pais'])->one()->id;
        $this->tester->dontSeeInDatabase(Albunsartistas::tableName(), ['idalbum' => 1, 'idartista' => $artistaId]);

        $artistaAnterior = Artistas::find()->where(['nome' => 'Rui Veloso'])->one();
        $artistaAnterior->delete();
        $artistaAtualizado = Artistas::find()->where(['nome' => 'João Pedro Pais'])->one();
        $artistaAtualizado->delete();
    }

    /*
     * Músicas
     */
    public function testMusicaIdAlbumInexistenteNaoValida()
    {
        $musica = new Musicas();
        $musica->nome = 'Ouvi dizer';
        $musica->ficheiro = date("mdyhis") . '.mp3';
        $musica->idalbuns = 123124354; // album inexistente

        $this->assertFalse($musica->validate());
    }

    public function testMusicaIdAlbumNuloNaoValida()
    {
        $musica = new Musicas();
        $musica->nome = 'Ouvi dizer';
        $musica->ficheiro = date("mdyhis") . '.mp3';
        $musica->idalbuns = null; // album nulo

        $this->assertFalse($musica->validate());
    }

    public function testMusicaNomeNumeroInteiroNaoValida()
    {
        $musica = new Musicas();
        $musica->nome = 1234; //nome tem de ser string
        $musica->ficheiro = date("mdyhis") . '.mp3';
        $musica->idalbuns = 1;

        $this->assertFalse($musica->validate());
    }

    public function testMusicaNomeNumeroNuloNaoValida()
    {
        $musica = new Musicas();
        $musica->nome = null; //nome tem de ser string
        $musica->ficheiro = date("mdyhis") . '.mp3';
        $musica->idalbuns = 1;

        $this->assertFalse($musica->validate());
    }

    public function testMusicaSave()
    {
        $musica = new Musicas();
        $musica->nome = 'Ouvi dizer'; //nome tem de ser string
        $musica->ficheiro = date("mdyhis") . '.mp3';
        $musica->idalbuns = 1;

        $this->assertTrue($musica->save());
    }

    public function testVerMusicaAdicionada()
    {
        $this->tester->seeInDatabase(Musicas::tableName(), ['nome' => 'Ouvi dizer']);
    }

    public function testAlterarMusicaAdicionada()
    {
        $musica = Musicas::find()->where(['nome' => 'Ouvi dizer'])->one();
        $musica->nome = 'Chaga';
        $this->assertTrue($musica->save());
    }

    public function testVerificarMusicaAlterada()
    {
        $this->tester->seeInDatabase(Musicas::tableName(), ['nome' => 'Chaga']);
    }

    public function testEliminarMusica()
    {
        $musica = Musicas::find()->where(['nome' => 'Chaga'])->one();
        $this->assertIsNumeric($musica->delete());
    }

    public function testVerificarSeMusicaFoiApagada()
    {
        $this->tester->dontSeeInDatabase(Musicas::tableName(), ['nome' => 'Chaga']);
    }
}