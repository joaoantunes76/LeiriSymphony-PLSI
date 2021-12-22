<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Albunsartistas */

$this->title = $model->idalbum;
$this->params['breadcrumbs'][] = ['label' => 'Albunsartistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="albunsartistas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idalbum' => $model->idalbum, 'idartista' => $model->idartista], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idalbum' => $model->idalbum, 'idartista' => $model->idartista], [
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
            'idalbum',
            'idartista',
        ],
    ]) ?>

</div>
