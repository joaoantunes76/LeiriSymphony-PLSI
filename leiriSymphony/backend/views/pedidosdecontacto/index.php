<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PedidosdecontactoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos de contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidosdecontacto-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'idproblema0',
                'label' => 'Tipo de Contacto',
                'value' => function ($data) {
                    return $data->idproblema0->nome.' ('.$data->idproblema0->tipo.')';
                }
            ],
            [
                'attribute' => 'idperfil0',
                'label' => 'Cliente',
                'value' => function ($data) {
                    return $data->idperfil0->nome;
                }
            ],
            'mensagem:ntext',
            'email:email',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>


</div>
