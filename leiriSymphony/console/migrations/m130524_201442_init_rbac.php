<?php

use yii\db\Migration;

class m130524_201442_init_rbac extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        //utilizadores
        $criarUtilizador = $auth->createPermission('criarUtilizador');
        $criarUtilizador->description = 'Criar um Utilizador';
        $auth->add($criarUtilizador);

        $verUtilizador = $auth->createPermission('verUtilizador');
        $verUtilizador->description = 'Ver um Utilizador';
        $auth->add($verUtilizador);

        $editarUtilizador = $auth->createPermission('editarUtilizador');
        $editarUtilizador->description = 'Editar um Utilizador';
        $auth->add($editarUtilizador);

        $eliminarUtilizador = $auth->createPermission('eliminarUtilizador');
        $eliminarUtilizador->description = 'Eliminar um Utilizador';
        $auth->add($eliminarUtilizador);


        //perfis
        $criarPerfil = $auth->createPermission('criarPerfil');
        $criarPerfil->description = 'Criar um Perfil';
        $auth->add($criarPerfil);

        $verPerfil = $auth->createPermission('verPerfil');
        $verPerfil->description = 'Ver um Perfil';
        $auth->add($verPerfil);

        $editarPerfil = $auth->createPermission('editarPerfil');
        $editarPerfil->description = 'Editar um Perfil';
        $auth->add($editarPerfil);

        $eliminarPerfil = $auth->createPermission('eliminarPerfil');
        $eliminarPerfil->description = 'Eliminar um Perfil';
        $auth->add($eliminarPerfil);


        //produtos
        $criarProduto = $auth->createPermission('criarProduto');
        $criarProduto->description = 'Criar um produto';
        $auth->add($criarProduto);

        $verProduto = $auth->createPermission('verProduto');
        $verProduto->description = 'Ver um produto';
        $auth->add($verProduto);

        $editarProduto = $auth->createPermission('editarProduto');
        $editarProduto->description = 'Editar um produto';
        $auth->add($editarProduto);

        $eliminarProduto = $auth->createPermission('eliminarProduto');
        $eliminarProduto->description = 'Eliminar um produto';
        $auth->add($eliminarProduto);


        //categorias
        $criarCategoria = $auth->createPermission('criarCategoria');
        $criarCategoria->description = 'Criar uma categoria';
        $auth->add($criarCategoria);

        $verCategoria = $auth->createPermission('verCategoria');
        $verCategoria->description = 'Ver uma categoria';
        $auth->add($verCategoria);

        $editarCategoria = $auth->createPermission('editarCategoria');
        $editarCategoria->description = 'Editar uma categoria';
        $auth->add($editarCategoria);

        $eliminarCategoria = $auth->createPermission('eliminarCategoria');
        $eliminarCategoria->description = 'Eliminar uma categoria';
        $auth->add($eliminarCategoria);


        //subcategorias
        $criarSubCategoria = $auth->createPermission('criarSubCategoria');
        $criarSubCategoria->description = 'Criar uma Subcategoria';
        $auth->add($criarSubCategoria);

        $verSubCategoria = $auth->createPermission('verSubCategoria');
        $verSubCategoria->description = 'Ver uma Subcategoria';
        $auth->add($verSubCategoria);

        $editarSubCategoria = $auth->createPermission('editarSubCategoria');
        $editarSubCategoria->description = 'Editar uma Subcategoria';
        $auth->add($editarSubCategoria);

        $eliminarSubCategoria = $auth->createPermission('eliminarSubCategoria');
        $eliminarSubCategoria->description = 'Eliminar uma Subcategoria';
        $auth->add($eliminarSubCategoria);


        //marcas
        $criarMarca = $auth->createPermission('criarMarca');
        $criarMarca->description = 'Criar uma marca';
        $auth->add($criarMarca);

        $verMarca = $auth->createPermission('verMarca');
        $verMarca->description = 'Ver uma marca';
        $auth->add($verMarca);

        $editarMarca = $auth->createPermission('editarMarca');
        $criarMarca->description = 'Editar uma marca';
        $auth->add($editarMarca);

        $eliminarMarca = $auth->createPermission('eliminarMarca');
        $eliminarMarca->description = 'Eliminar uma marca';
        $auth->add($eliminarMarca);


        //encomendas
        $criarEncomenda = $auth->createPermission('criarEncomenda');
        $criarEncomenda->description = 'Criar uma Encomenda';
        $auth->add($criarEncomenda);

        $verEncomenda = $auth->createPermission('verEncomenda');
        $verEncomenda->description = 'Ver uma Encomenda';
        $auth->add($verEncomenda);

        $editarEncomenda = $auth->createPermission('editarEncomenda');
        $editarEncomenda->description = 'Editar uma Encomenda';
        $auth->add($editarEncomenda);

        $eliminarEncomenda = $auth->createPermission('eliminarEncomenda');
        $eliminarEncomenda->description = 'Eliminar uma Encomenda';
        $auth->add($eliminarEncomenda);


        //artistas
        $criarArtista = $auth->createPermission('criarArtista');
        $criarArtista->description = 'Criar um Artista';
        $auth->add($criarArtista);

        $verArtista = $auth->createPermission('verArtista');
        $verArtista->description = 'Ver um Artista';
        $auth->add($verArtista);

        $editarArtista = $auth->createPermission('editarArtista');
        $editarArtista->description = 'Editar um Artista';
        $auth->add($editarArtista);

        $eliminarArtista = $auth->createPermission('eliminarArtista');
        $eliminarArtista->description = 'Eliminar um Artista';
        $auth->add($eliminarArtista);


        //albuns
        $criarAlbum = $auth->createPermission('criarAlbum');
        $criarAlbum->description = 'Criar um album';
        $auth->add($criarAlbum);

        $verAlbum = $auth->createPermission('verAlbum');
        $verAlbum->description = 'Ver um album';
        $auth->add($verAlbum);

        $editarAlbum = $auth->createPermission('editarAlbum');
        $editarAlbum->description = 'Editar um album';
        $auth->add($editarAlbum);

        $eliminarAlbum = $auth->createPermission('eliminarAlbum');
        $eliminarAlbum->description = 'Eliminar um album';
        $auth->add($eliminarAlbum);


        //musicas
        $criarMusica = $auth->createPermission('criarMusica');
        $criarMusica->description = 'Criar uma musica';
        $auth->add($criarMusica);

        $verMusica = $auth->createPermission('verMusica');
        $verMusica->description = 'Ver uma musica';
        $auth->add($verMusica);

        $editarMusica = $auth->createPermission('editarMusica');
        $editarMusica->description = 'Editar uma musica';
        $auth->add($editarMusica);

        $eliminarMusica = $auth->createPermission('eliminarMusica');
        $eliminarMusica->description = 'Eliminar uma musica';
        $auth->add($eliminarMusica);


        //eventos
        $criarEvento = $auth->createPermission('criarEvento');
        $criarEvento->description = 'Criar um evento';
        $auth->add($criarEvento);

        $verEvento = $auth->createPermission('verEvento');
        $verEvento->description = 'Ver um evento';
        $auth->add($verEvento);

        $editarEvento = $auth->createPermission('editarEvento');
        $editarEvento->description = 'Editar um evento';
        $auth->add($editarEvento);

        $eliminarEvento = $auth->createPermission('eliminarEvento');
        $eliminarEvento->description = 'Eliminar um evento';
        $auth->add($eliminarEvento);


        //demonstrações
        $criarDemonstracao = $auth->createPermission('criarDemonstracao');
        $criarDemonstracao->description = 'Criar uma Demonstração';
        $auth->add($criarDemonstracao);

        $verDemonstracao = $auth->createPermission('verDemonstracao');
        $verDemonstracao->description = 'Ver uma Demonstração';
        $auth->add($verDemonstracao);

        $editarDemonstracao = $auth->createPermission('editarDemonstracao');
        $editarDemonstracao->description = 'Editar uma Demonstração';
        $auth->add($editarDemonstracao);

        $eliminarDemonstracao = $auth->createPermission('eliminarDemonstracao');
        $eliminarDemonstracao->description = 'Eliminar uma Demonstração';
        $auth->add($eliminarDemonstracao);


        //tipoinformações
        $criarTipoInformacao = $auth->createPermission('criarTipoInformacao');
        $criarTipoInformacao->description = 'Criar uma TipoInformacao';
        $auth->add($criarTipoInformacao);

        $verTipoInformacao = $auth->createPermission('verTipoInformacao');
        $verTipoInformacao->description = 'Ver uma TipoInformacao';
        $auth->add($verTipoInformacao);

        $editarTipoInformacao = $auth->createPermission('editarTipoInformacao');
        $editarTipoInformacao->description = 'Editar uma TipoInformacao';
        $auth->add($editarTipoInformacao);

        $eliminarTipoInformacao = $auth->createPermission('eliminarTipoInformacao');
        $eliminarTipoInformacao->description = 'Eliminar uma TipoInformacao';
        $auth->add($eliminarTipoInformacao);


        //imagens
        $criarImagem = $auth->createPermission('criarImagem');
        $criarImagem->description = 'Criar uma Imagem';
        $auth->add($criarImagem);

        $verImagem = $auth->createPermission('verImagem');
        $verImagem->description = 'Ver uma Imagem';
        $auth->add($verImagem);

        $editarImagem = $auth->createPermission('editarImagem');
        $editarImagem->description = 'Editar uma Imagem';
        $auth->add($editarImagem);

        $eliminarImagem = $auth->createPermission('eliminarImagem');
        $eliminarImagem->description = 'Eliminar uma Imagem';
        $auth->add($eliminarImagem);


            //Roles
        //admin
        $admin = $auth->createRole('Administrador');
        $auth->add($admin);

        $auth->addChild($admin, $criarUtilizador);
        $auth->addChild($admin, $verUtilizador);
        $auth->addChild($admin, $editarUtilizador);
        $auth->addChild($admin, $eliminarUtilizador);
        $auth->addChild($admin, $criarPerfil);
        $auth->addChild($admin, $verPerfil);
        $auth->addChild($admin, $editarPerfil);
        $auth->addChild($admin, $eliminarPerfil);
        $auth->addChild($admin, $criarProduto);
        $auth->addChild($admin, $verProduto);
        $auth->addChild($admin, $editarProduto);
        $auth->addChild($admin, $eliminarProduto);
        $auth->addChild($admin, $criarCategoria);
        $auth->addChild($admin, $verCategoria);
        $auth->addChild($admin, $editarCategoria);
        $auth->addChild($admin, $eliminarCategoria);
        $auth->addChild($admin, $criarSubCategoria);
        $auth->addChild($admin, $verSubCategoria);
        $auth->addChild($admin, $editarSubCategoria);
        $auth->addChild($admin, $eliminarSubCategoria);
        $auth->addChild($admin, $criarMarca);
        $auth->addChild($admin, $verMarca);
        $auth->addChild($admin, $editarMarca);
        $auth->addChild($admin, $eliminarMarca);
        $auth->addChild($admin, $criarEncomenda);
        $auth->addChild($admin, $verEncomenda);
        $auth->addChild($admin, $editarEncomenda);
        $auth->addChild($admin, $eliminarEncomenda);
        $auth->addChild($admin, $criarArtista);
        $auth->addChild($admin, $verArtista);
        $auth->addChild($admin, $editarArtista);
        $auth->addChild($admin, $eliminarArtista);
        $auth->addChild($admin, $criarAlbum);
        $auth->addChild($admin, $verAlbum);
        $auth->addChild($admin, $editarAlbum);
        $auth->addChild($admin, $eliminarAlbum);
        $auth->addChild($admin, $criarMusica);
        $auth->addChild($admin, $verMusica);
        $auth->addChild($admin, $editarMusica);
        $auth->addChild($admin, $eliminarMusica);
        $auth->addChild($admin, $criarEvento);
        $auth->addChild($admin, $verEvento);
        $auth->addChild($admin, $editarEvento);
        $auth->addChild($admin, $eliminarEvento);
        $auth->addChild($admin, $criarDemonstracao);
        $auth->addChild($admin, $verDemonstracao);
        $auth->addChild($admin, $editarDemonstracao);
        $auth->addChild($admin, $eliminarDemonstracao);
        $auth->addChild($admin, $criarTipoInformacao);
        $auth->addChild($admin, $verTipoInformacao);
        $auth->addChild($admin, $editarTipoInformacao);
        $auth->addChild($admin, $eliminarTipoInformacao);
        $auth->addChild($admin, $criarImagem);
        $auth->addChild($admin, $verImagem);
        $auth->addChild($admin, $editarImagem);
        $auth->addChild($admin, $eliminarImagem);
        

        //gestor de loja
        $gestor = $auth->createRole('Gestor de loja');
        $auth->add($gestor);

        $auth->addChild($gestor, $criarProduto);
        $auth->addChild($gestor, $verProduto);
        $auth->addChild($gestor, $editarProduto);
        $auth->addChild($gestor, $eliminarProduto);
        $auth->addChild($gestor, $criarCategoria);
        $auth->addChild($gestor, $verCategoria);
        $auth->addChild($gestor, $editarCategoria);
        $auth->addChild($gestor, $eliminarCategoria);
        $auth->addChild($gestor, $criarSubCategoria);
        $auth->addChild($gestor, $verSubCategoria);
        $auth->addChild($gestor, $editarSubCategoria);
        $auth->addChild($gestor, $eliminarSubCategoria);
        $auth->addChild($gestor, $criarMarca);
        $auth->addChild($gestor, $verMarca);
        $auth->addChild($gestor, $editarMarca);
        $auth->addChild($gestor, $eliminarMarca);
        $auth->addChild($gestor, $criarArtista);
        $auth->addChild($gestor, $verArtista);
        $auth->addChild($gestor, $editarArtista);
        $auth->addChild($gestor, $eliminarArtista);
        $auth->addChild($gestor, $criarAlbum);
        $auth->addChild($gestor, $verAlbum);
        $auth->addChild($gestor, $editarAlbum);
        $auth->addChild($gestor, $eliminarAlbum);
        $auth->addChild($gestor, $criarMusica);
        $auth->addChild($gestor, $verMusica);
        $auth->addChild($gestor, $editarMusica);
        $auth->addChild($gestor, $eliminarMusica);
        $auth->addChild($gestor, $editarEncomenda);
        $auth->addChild($gestor, $verEncomenda);
        $auth->addChild($gestor, $criarImagem);
        $auth->addChild($gestor, $verImagem);
        $auth->addChild($gestor, $editarImagem);
        $auth->addChild($gestor, $eliminarImagem);


        //apoio ao cliente
        $apoio = $auth->createRole('Apoio ao cliente');
        $auth->add($apoio);

        $auth->addChild($apoio, $verProduto);
        $auth->addChild($apoio, $verCategoria);
        $auth->addChild($apoio, $verSubCategoria);
        $auth->addChild($apoio, $verMarca);
        $auth->addChild($apoio, $verArtista);
        $auth->addChild($apoio, $verAlbum);
        $auth->addChild($apoio, $verMusica);
        $auth->addChild($apoio, $verEvento);
        $auth->addChild($apoio, $editarEncomenda);
        $auth->addChild($apoio, $verEncomenda);
        $auth->addChild($apoio, $verImagem);
        $auth->addChild($apoio, $verTipoInformacao);
        $auth->addChild($apoio, $editarTipoInformacao);
        

        //cliente
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);

        $auth->addChild($cliente, $verPerfil);
        $auth->addChild($cliente, $editarPerfil);
        $auth->addChild($cliente, $verProduto);
        $auth->addChild($cliente, $verCategoria);
        $auth->addChild($cliente, $verSubCategoria);
        $auth->addChild($cliente, $verMarca);
        $auth->addChild($cliente, $verArtista);
        $auth->addChild($cliente, $verAlbum);
        $auth->addChild($cliente, $verMusica);
        $auth->addChild($cliente, $verEvento);
        $auth->addChild($cliente, $verDemonstracao);
        $auth->addChild($cliente, $editarEncomenda);
        $auth->addChild($cliente, $verEncomenda);
        $auth->addChild($cliente, $verImagem);
        $auth->addChild($cliente, $criarTipoInformacao);


        $auth->assign($admin, 1);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
