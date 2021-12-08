<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */

$this->title = 'Update Produtos: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'marcas' => $marcas,
        'subcategorias' => $subcategorias,
    ]) ?>

</div>