<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Imagens */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagens-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

    <label for="Imagens[idproduto]">Produto</label>
    <select name="Imagens[idproduto]" class="form-control">
        <?php
        foreach ($produtos as $produto) {
        ?>
            <option value="<?= $produto->id ?>"><?= $produto->nome ?></option>
        <?php
        }
        ?>
    </select>
    <br>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>