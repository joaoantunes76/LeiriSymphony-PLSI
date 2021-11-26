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
        }

        function closeSlideMenu() {
            document.getElementById('menu').style.width = '0';
        }

        function sideMenuClick() {
            event.stopPropagation();
        }
    </script>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <nav class="ls-navbar ls-bg-secondary">
            <div class="row  m-0 d-flex">
                <div class="col-md-4 col-sm-2">
                    <a class="ml-5" href="#menu" onclick="openSlideMenu()"><i class="ls-navbar-icons bi bi-list"></i></a>
                    <a class="navbar-brand" href="<?= Url::toRoute('site/index'); ?>"><?= Html::img('@web/logo.png', ['height' => "28px", 'class' => 'ls-logo']); ?></a>
                </div>
                <div class="col-md-4 col-sm-5 d-flex align-self-center">
                    <div class="ls-navbar-search">
                        <form action="search" method="GET">
                            <input class="form-control ls-navbar-search mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 d-flex flex-row-reverse">
                    <div class="ls-navbar-buttons">
                        <a href="<?= Url::toRoute('site/perfil'); ?>"><i class="ls-navbar-icons bi bi-person-circle"></i></a>
                        <a href="#favoritos"><i class="ls-navbar-icons bi bi-heart-fill"></i></a>
                        <a href="#carrinho"><i class="ls-navbar-icons bi bi-cart-fill"></i></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="menu" class="ls-sidemenu" onclick="closeSlideMenu()">
        <div class="ls-sidemenu-content" onclick="sideMenuClick()">
            <a href="#guitarras">Guitarras</a>
            <a href="#baterias">Baterias</a>
            <a href="#teclas">Teclas</a>
            <a href="#sopros">Sopros</a>
            <a href="#classicos">Clássicos</a>
            <a href="#tradicionais">Tradicionais</a>
            <a href="#acessorios">Acessórios</a>
            <a href="#musica">Música</a>
        </div>
        <div style="width: 100%; height:100%">

        </div>
    </div>
    <main role="main" class="d-inline-flex">


        <div class="container d-inline-flex">
            <div class="ls-filtros">
                <h5>Filtrar pesquisa</h1>
                    <br>
                    <b>Range de preço</b>
                    <hr>
                    <div class="row text-center">
                        <div class="col">
                            <label for="min">Min</label>
                            <input type="number" class="form-control custom-control" name="min" id="">
                        </div>
                        <div class="col">
                            <label for="max">Max</label>
                            <input type="number" class="form-control custom-control" name="max" id="">
                        </div>
                    </div>
                    <br>
                    <b>Marcas</b>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                        <label class="form-check-label" for="disabledFieldsetCheck">
                            Marca 1
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                        <label class="form-check-label" for="disabledFieldsetCheck">
                            Marca 2
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck">
                        <label class="form-check-label" for="disabledFieldsetCheck">
                            Marca 3
                        </label>
                    </div>
                    <br>
                    <b>Categoria</b>
                    <hr>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Guitarras" name="radio-stacked">
                        <label class="custom-control-label" for="Guitarras">Guitarras</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Baterias" name="radio-stacked">
                        <label class="custom-control-label" for="Baterias">Baterias</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Teclas" name="radio-stacked">
                        <label class="custom-control-label" for="Teclas">Teclas</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Sopros" name="radio-stacked">
                        <label class="custom-control-label" for="Sopros">Sopros</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Classicos" name="radio-stacked">
                        <label class="custom-control-label" for="Classicos">Clássicos</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Tradicionais" name="radio-stacked">
                        <label class="custom-control-label" for="Tradicionais">Tradicionais</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Acessorios" name="radio-stacked">
                        <label class="custom-control-label" for="Acessorios">Acessórios</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="Musica" name="radio-stacked">
                        <label class="custom-control-label" for="Musica">Música</label>
                    </div>
            </div>
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
