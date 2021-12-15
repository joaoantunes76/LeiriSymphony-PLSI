<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EncomendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Encomendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Encomendas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'idperfil0',
                'header' => 'Cliente',
                'value' => 'idperfil0.nome',
                'format' => ['text'],
            ],
            'estado',
            'pago',
            [
                'attribute' => 'preco',
                'header' => 'Preço',
                'value' => 'preco',
                'format' => ['text'],
            ],
            [
                'attribute' => 'tipoexpedicao',
                'header' => 'Tipo de Expedição',
                'value' => 'tipoexpedicao',
                'format' => ['text'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'header'=>'Actions',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>


</div>
