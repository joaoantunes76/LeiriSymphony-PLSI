<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Imagens */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagens-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imagem')->textInput() ?>

    <?= $form->field($model, 'produtoId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
