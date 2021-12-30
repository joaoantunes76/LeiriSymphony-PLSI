<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AlbunsartistasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Selecionar Artista';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albunsartistas-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',

            ['class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view}',
                'buttons'=>[
                    'view'=>function ($url, $model) {
                        return print_r($url). Html::a('Selecionar', ['create', 'idartista' => $model->id], ['class' => 'btn btn-primary']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
