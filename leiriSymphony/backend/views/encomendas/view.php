<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Encomendas */

$this->title = $model->encomendaId;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encomendas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'encomendaId' => $model->encomendaId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'encomendaId' => $model->encomendaId], [
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
            'encomendaId',
            'perfilId',
            'estado',
            'estaPago',
        ],
    ]) ?>

</div>
