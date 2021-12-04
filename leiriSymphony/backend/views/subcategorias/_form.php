<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategorias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcategorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsubcategoria')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
