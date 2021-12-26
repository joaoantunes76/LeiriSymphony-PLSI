<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <?php $this->head() ?>
    <script>
        function openSlideMenu() {
            document.getElementById('menu').style.width = '100%';
            document.body.style.overflow = "hidden";
            closeCarrinhoCompras();
        }

        function closeSlideMenu() {
            document.getElementById('menu').style.width = '0';
        }

        function sideMenuClick() {
            event.stopPropagation();
        }

        function openCarrinhoCompras() {
            document.getElementById('carrinhocompras').style.width = '100%';
            document.body.style.overflow = "hidden";
            closeSlideMenu();
        }

        function closeCarrinhoCompras() {
            document.getElementById('carrinhocompras').style.width = '0';
        }
    </script>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <nav class="ls-navbar ls-bg-secondary">
            <div class="row m-0 d-flex">
                <div class="col-md-4 col-sm-2">
                    <a class="ml-5" href="#menu" onclick="openSlideMenu()"><i class="ls-navbar-icons bi bi-list"></i></a>
                    <a class="navbar-brand" href="<?= Url::toRoute('site/index'); ?>"><?= Html::img('@web/logo.png', ['height' => "28px", 'class' => 'ls-logo']); ?></a>
                </div>
                <div class="col-md-4 col-sm-5 d-flex align-self-center">
                    <div class="ls-navbar-search">
                        <form action="<?= Url::toRoute("produtos/index") ?>" method="GET">
                            <input class="form-control ls-navbar-search mr-sm-2" type="search" name="nome" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 d-flex flex-row-reverse">
                    <div class="ls-navbar-buttons">
                        <a href="<?= Url::toRoute('site/perfil'); ?>"><i class="ls-navbar-icons bi bi-person-circle"></i></a>
                        <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="ls-navbar-icons bi bi-heart-fill"></i></a>
                        <a href="#carrinho" onclick="openCarrinhoCompras()"><i class="ls-navbar-icons bi bi-cart-fill"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="menu" class="ls-sidemenu" onclick="closeSlideMenu()">
        <div class="ls-sidemenu-content" onclick="sideMenuClick()">
            <?php
                $categorias = \common\models\Categorias::find()->all();
                foreach($categorias as $categoria){
                ?>
                    <a href="<?= Url::toRoute('produtos/index') ?>?Categorias=<?= $categoria->id?>"><?= $categoria->nome ?></a>
                <?php
                }
            ?>
        </div>
        <div style="width: 100%; height:100%">

        </div>
    </div>

    <div id="carrinhocompras" class="ls-sidemenu-right" onclick="closeCarrinhoCompras()">
        <div class="ls-sidemenu-right-content d-flex flex-column text-center justify-content-between" onclick="sideMenuClick()">
            <div>
                <br>
                <h5>Carrinho de compras</h5>
                <?php
                    $produtosCarrinho = \common\models\Carrinho::find()->where(['idperfil'=> Yii::$app->user->id])->all();
                    foreach ($produtosCarrinho as $produtoCarrinho){
                        $produto = \common\models\Produtos::find()->where(['id' => $produtoCarrinho->idproduto])->one();
                ?>
                        <hr>
                        <div class="mt-4">
                                <?= Html::a('Remover', Url::to(['produtos/delete-carrinho', 'idproduto' => $produtoCarrinho->idproduto]), [
                                    'class' => 'btn btn-danger',
                                ]) ?>
                                <div class="produto mt-4">
                                    <a href="<?= Url::toRoute(['produtos/view', 'produtoId' => $produtoCarrinho->idproduto]) ?>">
                                        <?= Html::img(Yii::getAlias('@imageurl') . '/' . $produto->imagens[0]->nome, ['height' => "126px", 'class' => 'logo']); ?>
                                        <p><?= Html::encode($produto->nome) ?> (<?= Html::encode($produto->preco) ?> €)</p>
                                    </a>
                                </div>
                        </div>
                <?php
                    }
                ?>
            </div>

            <div class="row mb-5">
                <div class="col">
                    <?= Html::a('Comprar', Url::to(['site/comprar']), [
                        'class' => 'btn btn-primary',
                    ]) ?>
                </div>
            </div>

        </div>
        <div style="width: 100%; height:100%">

        </div>
    </div>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
