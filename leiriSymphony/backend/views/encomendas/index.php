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

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'idperfil0',
                'label' => 'Cliente',
                'value' => 'idperfil0.nome',
                'format' => ['text'],
            ],
            'estado',
            [
                'attribute' => 'pago',
                'label' => 'Pago',
                'format' => ['text'],
                'value' => function ($data){
                    return $data->pago ? "Sim" : "Não";
                },
            ],
            [
                'attribute' => 'preco',
                'label' => 'Preço',
                'value' => 'preco',
                'format' => ['text'],
            ],
            [
                'attribute' => 'tipoexpedicao',
                'label' => 'Tipo de Expedição',
                'value' => 'tipoexpedicao',
                'format' => ['text'],
            ],
            'data',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'template' => '{view} {update} {delete}',
            ],
        ],
    ]); ?>


</div>
