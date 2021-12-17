<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $produtos common\models\Produtos */
/* @var $marcas common\models\Marcas */
/* @var $categorias common\models\Categorias */
/* @var $subcategorias common\models\Subcategorias */

$this->title = 'Produtos';

?>

<div class="produtos-index d-flex">
    <div class="content">
        <?= $this->render('components/_filtertop.php', [
                'marcas' => $marcas,
                'categorias' => $categorias,
                'subcategorias' => $subcategorias,
        ]) ?>
        <br>
        <h1>Resultados: </h1>

        <div class="row mt-5 justify-content-center">
            <?php
            foreach ($produtos as $produto) {
            ?>
                <div class="d-flex justify-content-center text-center">
                    <?= $this->renderFile(Yii::getAlias('@app') . '/views/layouts/components/_product-item.php', ['produto' => $produto]); ?>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>