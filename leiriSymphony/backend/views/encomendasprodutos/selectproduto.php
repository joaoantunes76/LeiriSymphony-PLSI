<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'idsubcategoria0',
                'label' => 'Subcategoria',
                'value' => 'idsubcategoria0.nome',
                'format' => ['text'],
            ],
            [
                'attribute' => 'idmarca0',
                'label' => 'Marca',
                'value' => 'idmarca0.nome',
                'format' => ['text'],
            ],
            'nome',
            [
                'attribute' => 'usado',
                'label' => 'Usado',
                'value' => function ($data){
                    return $data->usado == 0 ? 'Não' : 'Sim';
                },
            ],
            'preco',
            'stock',
            [
                'format'=>'raw',
                'value' => function($data){
                    return Html::a('Selecionar', \yii\helpers\Url::toRoute('create?idencomenda='.$_GET["idencomenda"].'&idproduto='.$data->id), ['class' => 'btn btn-primary']);
                }
            ]
        ],
    ]);  ?>


</div>