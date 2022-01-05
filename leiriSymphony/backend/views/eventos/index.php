<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-index">

    <h1>Lista de Eventos</h1>

    <p>
        <?= Html::a('Criar Evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);
        $eventos = $dataProvider->getModels();
    ?>

    <?=  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'label' => 'Lotação',
                'attribute' => 'lotacao',
                'format' => ['text'],
            ],
            [
                'label' => 'Descrição',
                'attribute' => 'descricao',
                'format' => ['text'],
                'contentOptions' => ['style' => 'text-overflow: ellipsis; white-space: nowrap; max-width: 25vw; overflow: hidden;'],
            ],
            [
                'label' => 'Data',
                'attribute' => 'data',
                'format' => ['date', 'php:Y-m-d'],
            ],
            [
                'label' => 'Hora de Início',
                'attribute' => 'horainicio',
                'format' => ['time', 'php:H:i'],
            ],
            [
                'label' => 'Hora de Encerramento',
                'attribute' => 'horafim',
                'format' => ['time', 'php:H:i'],
            ],

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['width' => '80px']],
        ],
    ]); ?>




</div>
