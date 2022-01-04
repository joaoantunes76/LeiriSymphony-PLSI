<?php
namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use Codeception\Util\Locator;
use common\models\Musicas;

class CrudAlbumCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryAdicionarAlbum(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos produtos [albuns/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Álbuns');
        $I->click('Álbuns');
        $I->see("Albuns");
        //Criar um novo Album
        $I->seeLink('Criar Albuns');
        $I->click('Criar Albuns');
        $I->see("Criar Albuns");
        $I->submitForm('#create-albuns', [
            'Albuns[nome]' => 'Musicas do João',
            'Albuns[preco]' => 11.5,
            'Albuns[datalancamento]' => '2021-07-12',
            $I->attachFile('#uploadform-imagefile','album_teste.png'),
        ]);
        $I->see("Musicas do João");
    }

    public function tryAdicionarERemoverArtista(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos albuns [albuns/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Álbuns');
        $I->click('Álbuns');
        $I->see("Albuns");
        $I->see("Musicas do Bernardo");
        //Ir para a página de vista do album [albuns/view]
        $I->see('', Locator::href('/index-test.php/albuns/view?id=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albuns/view?id=1"]']);
        $I->see("Musicas do Bernardo");
        //Remover Artista
        $I->see('Remover', Locator::href('/index-test.php/albunsartistas/delete?idalbum=1&idartista=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albunsartistas/delete?idalbum=1&idartista=1"]']);
        $I->see("Musicas do Bernardo");
        //Adicionar Artista anteriormente removido
        $I->seeLink('Adicionar Artista');
        $I->click('Adicionar Artista');
        $I->see('Selecionar Artista');
        $I->see('Selecionar', Locator::href('/index-test.php/albunsartistas/create?idartista=1&idalbum=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albunsartistas/create?idartista=1&idalbum=1"]']);
        $I->see("Musicas do Bernardo");
    }

    public function tryAdicionarERemoverMusica(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos albuns [albuns/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Álbuns');
        $I->click('Álbuns');
        $I->see("Albuns");
        $I->see("Musicas do Bernardo");
        //Ir para a página de vista do album [albuns/view]
        $I->see('', Locator::href('/index-test.php/albuns/view?id=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albuns/view?id=1"]']);
        $I->see("Musicas do Bernardo");
        //Adicionar Musica
        $I->seeLink('Adicionar Musica');
        $I->click('Adicionar Musica');
        $I->see("Criar Músicas");
        $I->submitForm('#create-musicas', [
            'Musicas[nome]' => 'musica teste',
            $I->attachFile('#uploadform-musicfile','piano_teste.mp3'),
        ]);
        $I->seeLink('Ir para Album');
        $I->click('Ir para Album');
        $I->see("Musicas do Bernardo");
        //Remover Musica
        $id = Musicas::find()->orderBy(['id' => SORT_DESC])->one()->id;
        $I->see('', Locator::href('/index-test.php/musicas/delete?id='.$id.'&idalbuns=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/musicas/delete?id='.$id.'&idalbuns=1"]']);
        $I->dontSee('', Locator::href('/index-test.php/musicas/delete?id='.$id.'&idalbuns=1'));
    }

    public function tryEditarAlbum(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos albuns [albuns/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Álbuns');
        $I->click('Álbuns');
        $I->see("Albuns");
        $I->see("Musicas do Bernardo");
        //Editar o Album
        $I->see('', Locator::href('/index-test.php/albuns/update?id=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albuns/update?id=1"]']);
        $I->see("Editar Album: Musicas do Bernardo");
        $I->seeInFormFields('.albuns-update', [
            'Albuns[nome]' => 'Musicas do Bernardo',
            'Albuns[preco]' => 5.90,
            'Albuns[datalancamento]' => '2022-01-04',
        ]);
        $I->submitForm('#create-albuns', [
            'Albuns[nome]' => 'Musicas do João',
            'Albuns[preco]' => 9.30,
            'Albuns[datalancamento]' => '2021-01-04',
            $I->attachFile('#uploadform-imagefile','album_teste.png'),
        ]);
        $I->see('Musicas do João');
    }

    public function tryEliminarAlbum(FunctionalTester $I)
    {
        //Fazer Login
        $I->amOnPage(['site/login']);
        $I->see("Sign in to start your session");
        $I->fillField('LoginForm[username]', 'admin');
        $I->fillField('LoginForm[password]', 'admin123');
        $I->click('Sign In');
        //Na página inicial [site/index]
        $I->see("Página Inicial");
        //Ir para a página da lista dos albuns [albuns/index]
        $I->seeLink('Gestão de loja');
        $I->click('Gestão de loja');
        $I->seeLink('Álbuns');
        $I->click('Álbuns');
        $I->see("Albuns");
        $I->see("Musicas do Bernardo");
        //Ir para a página de vista do album [albuns/view]
        $I->see('', Locator::href('/index-test.php/albuns/view?id=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albuns/view?id=1"]']);
        $I->see("Musicas do Bernardo");
        //Remove os artistas
        $I->see('Remover', Locator::href('/index-test.php/albunsartistas/delete?idalbum=1&idartista=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albunsartistas/delete?idalbum=1&idartista=1"]']);
        $I->see('Remover', Locator::href('/index-test.php/albunsartistas/delete?idalbum=1&idartista=2'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/albunsartistas/delete?idalbum=1&idartista=2"]']);
        $I->see("Musicas do Bernardo");
        //Remove as musicas
        $I->see('', Locator::href('/index-test.php/musicas/delete?id=1&idalbuns=1'));
        $I->click(['xpath'=>'//a[@href="/index-test.php/musicas/delete?id=1&idalbuns=1"]']);
        $I->dontSee('', Locator::href('/index-test.php/musicas/delete?id=1&idalbuns=1'));
        $I->see("Musicas do Bernardo");
        //Eliminar o Album
        $I->seeLink('Eliminar');
        $I->click('Eliminar');
        $I->see("Albuns");
    }
}
