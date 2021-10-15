<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        //produtos
        $criarProduto = $auth->createPermission('criarProduto');
        $criarProduto->description = 'Criar um produto';
        $auth->add($criarProduto);

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

        $editarCategoria = $auth->createPermission('editarCategoria');
        $editarCategoria->description = 'Editar uma categoria';
        $auth->add($editarCategoria);

        $eliminarCategoria = $auth->createPermission('eliminarCategoria');
        $eliminarCategoria->description = 'Eliminar uma categoria';
        $auth->add($eliminarCategoria);


        //marcas
        $criarMarca = $auth->createPermission('criarMarca');
        $criarMarca->description = 'Criar uma marca';
        $auth->add($criarMarca);

        $editarMarca = $auth->createPermission('editarMarca');
        $criarMarca->description = 'Editar uma marca';
        $auth->add($editarMarca);

        $eliminarMarca = $auth->createPermission('eliminarMarca');
        $eliminarMarca->description = 'Eliminar uma marca';
        $auth->add($eliminarMarca);


        //albuns
        $criarAlbum = $auth->createPermission('criarAlbum');
        $criarAlbum->description = 'Criar um album';
        $auth->add($criarAlbum);

        $editarAlbum = $auth->createPermission('editarAlbum');
        $editarAlbum->description = 'Editar um album';
        $auth->add($editarAlbum);

        $eliminarAlbum = $auth->createPermission('eliminarAlbum');
        $eliminarAlbum->description = 'Eliminar um album';
        $auth->add($eliminarAlbum);


        //eventos
        $criarEvento = $auth->createPermission('criarAlbum');
        $criarEvento->description = 'Criar um evento';
        $auth->add($criarEvento);
    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
