<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AlbunsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Albuns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albuns-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Albuns', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'preco',
            'datalancamento',
             [
                 'attribute' => 'idimagem0',
                 'label' => 'Imagem',
                 'format' => 'html',
                 'value' => function ($data) {
                    return Html::img(Yii::getAlias('@imageurl') . '/' . $data->idimagem0->nome, ['width' => "154px"]);
                 }
             ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
