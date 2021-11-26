<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */

$this->title = $model->produtoId;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'produtoId' => $model->produtoId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'produtoId' => $model->produtoId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'produtoId',
            'subcategoriaId',
            'marcaId',
            'produtoNome',
            'descricao:ntext',
            'digital',
            'preco',
            'ficheiro:ntext',
        ],
    ]) ?>

</div>
