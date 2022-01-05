<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\perfisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perfilId') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'NIF') ?>

    <?= $form->field($model, 'endereco') ?>

    <?php // echo $form->field($model, 'cidade') ?>

    <?php // echo $form->field($model, 'codigoPostal') ?>

    <?php // echo $form->field($model, 'telefone') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
