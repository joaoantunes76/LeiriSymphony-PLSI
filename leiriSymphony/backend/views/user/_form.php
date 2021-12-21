<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($signup, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($signup, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($signup, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'NIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'codigoPostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'telefone')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
