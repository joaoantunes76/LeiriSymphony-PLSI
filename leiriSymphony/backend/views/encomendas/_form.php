<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */
/* @var $form yii\widgets\ActiveForm */
/* @var $perfis common\models\Perfis */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <label for="Encomendas[idperfil]">Perfil</label>
    <select name="Encomendas[idperfil]" class="form-control">
        <?php
        foreach ($perfis as $perfil) {
            ?>
            <option value="<?= $perfil->id ?>" <?= $perfil->id == $model->idperfil ? 'selected' : "" ?>><?= $perfil->nome ?></option>
            <?php
        }
        ?>
    </select>
    <br>

    <?= $form->field($model, 'estado')->dropDownList([ 'Em Processamento' => 'Em Processamento', 'Expedido' => 'Expedido', 'Entregue' => 'Entregue', 'Pronto para Levantamento' => 'Pronto para Levantamento', 'Cancelada' => 'Cancelada', 'Erro' => 'Erro', ], ['prompt' => '']) ?>

    <label>Pago</label>
    <select name="Encomendas[pago]" class="form-control">
        <option value="1" <?= $model->pago == 1 ? "selected" : "" ?>>Sim</option>
        <option value="0" <?= $model->pago == 0 ? "selected" : "" ?>>Não</option>
    </select>
    <br>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoexpedicao')->dropDownList([ 'Levantamento em loja' => 'Levantamento em loja', 'Envio' => 'Envio', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
