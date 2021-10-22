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



            //Roles
        //admin
        $admin = $auth->createRole('Administrador');
        $auth->add($admin);

        $auth->addChild($admin, $criarProduto);
        $auth->addChild($admin, $verProduto);
        $auth->addChild($admin, $editarProduto);
        $auth->addChild($admin, $eliminarProduto);
        $auth->addChild($admin, $criarCategoria);
        $auth->addChild($admin, $verCategoria);
        $auth->addChild($admin, $editarCategoria);
        $auth->addChild($admin, $eliminarCategoria);
        $auth->addChild($admin, $criarMarca);
        $auth->addChild($admin, $verMarca);
        $auth->addChild($admin, $editarMarca);
        $auth->addChild($admin, $eliminarMarca);
        $auth->addChild($admin, $criarAlbum);
        $auth->addChild($admin, $verAlbum);
        $auth->addChild($admin, $editarAlbum);
        $auth->addChild($admin, $eliminarAlbum);
        $auth->addChild($admin, $criarEvento);
        $auth->addChild($admin, $verEvento);
        $auth->addChild($admin, $editarEvento);
        $auth->addChild($admin, $eliminarEvento);

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
        $auth->addChild($gestor, $criarMarca);
        $auth->addChild($gestor, $verMarca);
        $auth->addChild($gestor, $editarMarca);
        $auth->addChild($gestor, $eliminarMarca);
        $auth->addChild($gestor, $criarAlbum);
        $auth->addChild($gestor, $verAlbum);
        $auth->addChild($gestor, $editarAlbum);
        $auth->addChild($gestor, $eliminarAlbum);

        //cliente
        $cliente = $auth->createRole('Cliente');
        $auth->add($cliente);

        $auth->addChild($cliente, $verProduto);
        $auth->addChild($cliente, $verCategoria);
        $auth->addChild($cliente, $verMarca);
        $auth->addChild($cliente, $verAlbum);
        $auth->addChild($cliente, $verEvento);

    }

    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}
