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
    <?php $this->head() ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="img/favicon.png">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?= Url::toRoute("site/index") ?>"> <img src="<?=  \Yii::getAlias('@web') ?>/logo.png" alt="logo" width="180px"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= Url::toRoute("site/index") ?>">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown_1"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Produtos
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <?php
                                            $categorias = \common\models\Categorias::find()->all();
                                            foreach($categorias as $categoria){
                                        ?>
                                                <a class="dropdown-item" href="<?= Url::toRoute('produtos/index') ?>?Categoria=<?= $categoria->id?>"><?= $categoria->nome ?></a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <?php
                                        if(Yii::$app->user->isGuest){
                                        ?>
                                            <a class="nav-link" href="<?= Url::toRoute('site/login') ?>">Login</a>
                                        <?php
                                        }
                                        else{
                                        ?>
                                            <a class="nav-link dropdown-toggle" id="navbarDropdown_3"
                                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Conta
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                                <a class="dropdown-item" href="<?= Url::toRoute('perfis/index') ?>">Perfil</a>
                                                <a class="dropdown-item" href="<?= Url::toRoute('perfis/encomendas') ?>">Encomendas</a>
                                            </div>
                                        <?php
                                        }
                                    ?>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <a href="<?= Url::toRoute('favoritos/index') ?>"><i class="ti-heart"></i></a>
                            <a href="<?= Url::toRoute('carrinho/index') ?>">
                                <i class="fas fa-cart-plus"></i>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form id="searchform" action="<?= Url::toRoute('produtos/index') ?>" method="get" class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here" name="nome">
                    <button type="submit" id="submitsearchform" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    <main role="main" class="site-main">
        <div>
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-12 col-lg-12">
                    <div class="single_footer_part">
                        <h4>Top Products</h4>
                        <ul class="list-unstyled row">
                            <li class="ml-3"><a href="<?= Url::toRoute('site/contact') ?>">Contact</a></li>
                            <li class="ml-4"><a href="<?= Url::toRoute('site/about') ?>">About</a></li>
                        </ul>
                    </div>
                </div>
        </div>
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
