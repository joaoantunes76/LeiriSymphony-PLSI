<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demonstracoes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idproduto')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
