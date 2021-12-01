<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
?>

<div class="produtos-index d-flex">
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
    <div class="content">
        <h1>Resultados: </h1>

        <div class="row mt-5">
            <?php
            for ($produto = 1; $produto <= 12; $produto++) {
            ?>
                <a style="display:block;" class="col ls-produto" id="<?= $produto ?>" href="<?= Url::toRoute(['produtos/view', 'produtoId' => $produto]) ?>">
                    <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                    <p class="mt-2">Nome do produto</p>
                    <p>0.00€</p>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>