<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */
/* @var $form yii\widgets\ActiveForm */
/* @var $idproduto */
/* @var $idencomenda */
?>

<div class="encomendasprodutos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idencomenda')->hiddenInput(['value' => $idencomenda])->label(false) ?>

    <?= $form->field($model, 'idproduto')->hiddenInput(['value' => $idproduto])->label(false) ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
