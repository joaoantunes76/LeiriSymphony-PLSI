<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'horainicio')->textInput() ?>

    <?= $form->field($model, 'horafim')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
