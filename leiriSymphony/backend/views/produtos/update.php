<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Produtos */

$this->title = 'Update Produtos: ' . $model->produtoId;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->produtoId, 'url' => ['view', 'produtoId' => $model->produtoId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produtos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
