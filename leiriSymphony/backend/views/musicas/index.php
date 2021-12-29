<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MusicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Músicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicas-index">

    

    <p>
        <?= Html::a('Create Musicas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'ficheiro',
            'idalbuns',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
