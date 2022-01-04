<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidosdecontacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidosdecontacto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idproblema')->textInput() ?>

    <?= $form->field($model, 'idperfil')->textInput() ?>

    <?= $form->field($model, 'mensagem')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
