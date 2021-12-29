<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Demonstracoes', 'url' => ['/produtos/view?id='.$model->idproduto]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="demonstracoes-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'idproduto' => $model->idproduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id, 'idproduto' => $model->idproduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('Ir para Produto', ['produtos/view', 'id' => $model->idproduto], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            [
              'attribute' => 'idproduto0.nome',
              'label' => 'Produto'
            ]
        ],
    ]) ?>

</div>
