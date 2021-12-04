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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idperfil',
            'estado',
            'pago',
            'preco',
            //'tipoexpedicao',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
