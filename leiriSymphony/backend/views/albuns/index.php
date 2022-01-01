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

    <p>
        <?= Html::a('Criar  Albuns', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',
            [
                'attribute' => 'preco',
                'label' => 'Preço',
            ],
            [
             'attribute' => 'datalancamento',
             'label' => 'Data de Lançamento',
            ],
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
