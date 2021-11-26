<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProdutosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'produtoId') ?>

    <?= $form->field($model, 'subcategoriaId') ?>

    <?= $form->field($model, 'marcaId') ?>

    <?= $form->field($model, 'produtoNome') ?>

    <?= $form->field($model, 'descricao') ?>

    <?php // echo $form->field($model, 'digital') ?>

    <?php // echo $form->field($model, 'preco') ?>

    <?php // echo $form->field($model, 'ficheiro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
