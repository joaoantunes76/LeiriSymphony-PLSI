<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ImagensSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imagens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagens-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Imagens', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'nome',
            [
                'label' => 'Imagem',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img("@web/uploads/$data->nome", ['height' => '150px']);
                },
            ],
            'idproduto',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'template' => '{view} {delete}',
            ],
        ],
    ]); ?>


</div>