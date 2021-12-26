<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomendasprodutos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idencomenda')->textInput() ?>

    <?= $form->field($model, 'idproduto')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
