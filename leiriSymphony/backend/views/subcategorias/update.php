<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategorias */
/* @var $categorias common\models\Categorias */

$this->title = 'Update Subcategorias: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategorias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,
    ]) ?>

</div>
