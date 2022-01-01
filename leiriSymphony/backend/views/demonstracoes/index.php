<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DemonstracoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demonstrações';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demonstracoes-index">



    <p>
        <?= Html::a('Criar  Demonstracoes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idproduto',
            'nome',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
