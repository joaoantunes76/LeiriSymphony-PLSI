<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Marcas */

$this->title = 'Update Marcas: ' . $model->marcaId;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->marcaId, 'url' => ['view', 'marcaId' => $model->marcaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
