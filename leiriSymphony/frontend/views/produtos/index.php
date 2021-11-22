<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
?>
<div class="produtos-index">

    <h1>Resultados: </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?php /*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'produtoId',
            'subcategoriaId',
            'marcaId',
            'produtoNome',
            'descricao:ntext',
            //'digital',
            //'preco',
            //'ficheiro:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>


    <?php
    $idProduto = 0;
    for ($linha = 0; $linha < 2; $linha++) {
    ?>
        <div class="row mt-5">
            <?php
            for ($produto = 0; $produto < 6; $produto++) {
                $idProduto++;
            ?>
                <a style="display:block;" class="col ls-produto" id="<?= $idProduto ?>" href="<?= Url::toRoute(['produtos/view', 'produtoId' => $idProduto]) ?>">
                    <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                    <p class="mt-2">Nome do produto</p>
                    <p>0.00€</p>
                </a>
            <?php
            }
            ?>
        </div>

    <?php
    }
    ?>




</div>