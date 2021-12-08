<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EncomendasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomendas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idperfil') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'pago') ?>

    <?= $form->field($model, 'preco') ?>

    <?php // echo $form->field($model, 'tipoexpedicao') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
