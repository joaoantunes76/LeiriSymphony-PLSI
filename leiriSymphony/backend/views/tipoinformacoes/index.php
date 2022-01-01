<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TipoinformacoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipos de contacto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoinformacoes-index">

    <p>
        <?= Html::a('Criar Tipo de Contacto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
