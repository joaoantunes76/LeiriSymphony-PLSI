<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AlbunsartistasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albunsartistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albunsartistas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Albunsartistas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idalbum',
            'idartista',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
