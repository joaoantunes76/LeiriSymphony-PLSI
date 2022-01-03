<?php

use yii\bootstrap4\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
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
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
        <div>
            <table class="table table-striped table-bordered ml-5">
                <thead>
                    <tr>
                        <th>Artista(s)</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($model->idartistas as $artista) {
                    ?>
                        <tr>
                            <td><?= $artista->nome ?></td>
                            <td>
                                <?= Html::a('Remover', ['albunsartistas/delete?idalbum='.$model->id.'&idartista='.$artista->id], ['class' => 'btn btn-danger', 'data-method' => 'post']) ?>
                        </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <br>
    <p>
        <?= Html::a('Adicionar Musica', ['musicas/create?albumId='.$model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Adicionar Artista', ['albunsartistas/create?idalbum='.$model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'nome',
            'ficheiro',
            [
                    'label' => 'Musica',
                    'format' => 'raw',
                    'value' => function($data) {
                        if($data->ficheiro != ""){
                            return '<audio controls><source src="'.Yii::getAlias('@musicurl').$data->ficheiro.'" type="audio/ogg"></audio>';
                        }
                        else {
                            return "";
                        }
                    },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to(['musicas/'.$action, 'id' => $model->id, 'idalbuns' => $model->idalbuns]);
                }
            ],
        ],
    ]); ?>







</div>
