<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idperfil')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'Em Processamento' => 'Em Processamento', 'Expedido' => 'Expedido', 'Entregue' => 'Entregue', 'Pronto para Levantamento' => 'Pronto para Levantamento', 'Cancelada' => 'Cancelada', 'Erro' => 'Erro', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pago')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoexpedicao')->dropDownList([ 'Levantamento em loja' => 'Levantamento em loja', 'Envio' => 'Envio', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
