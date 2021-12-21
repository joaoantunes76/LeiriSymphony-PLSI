<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $searchModel common\models\MusicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Albuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="albuns-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="d-flex">
        <div class="mr-5">
            <?= Html::img(Yii::getAlias('@imageurl') . '/' . $model->idimagem0->nome, ['width' => "154px"]) ?>
        </div>
        <div>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'nome',
                    [
                        'attribute' => 'preco',
                        'label' => 'Preço',
                        'value' => function ($data) {
                            return $data->preco . '€';
                        }
                    ],
                    [
                        'attribute' => 'datalancamento',
                        'label' => 'Data de lançamento',
                    ]
                ],
            ]) ?>
        </div>
    </div>

    <br>
    <p>
        <?= Html::a('Adicionar Musica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'nome',
            'ficheiro',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>






</div>
