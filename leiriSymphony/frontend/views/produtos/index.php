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
            <?php
            if (isset($_GET["categoria"])) {
                echo $this->render('_filtercategorias-get');
            } else {
                echo $this->render('_filtercategorias');
            }

            ?>
    </div>
    <div class="content">
        <h1>Resultados: </h1>

        <div class="row mt-5">
            <?php
            foreach ($produtos as $produto) {

                if ($produto->imagens != null) {
                    $imagemNome = $produto->imagens[0]->nome;
                } else {
                    $imagemNome = "";
                }
            ?>
                <a style="display:block;" class="col ls-produto" id="<?= $produto->id ?>" href="<?= Url::toRoute(['produtos/view', 'produtoId' => $produto->id]) ?>">
                    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "154px", 'class' => 'Guitarra-classica']); ?>
                    <p class="mt-2"><?= $produto->nome ?></p>
                    <p>0.00€</p>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</div>