<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subcategorias */

$this->title = 'Update Subcategorias: ' . $model->subcategoriaId;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subcategoriaId, 'url' => ['view', 'subcategoriaId' => $model->subcategoriaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
