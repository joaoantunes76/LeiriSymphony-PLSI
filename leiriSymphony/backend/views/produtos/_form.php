<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <label for="Produtos[idsubcategoria]">Categoria</label>
    <select name="Produtos[idsubcategoria]" class="form-control">
        <?php
        foreach ($subcategorias as $subcategoria) {
        ?>
            <option value="<?= $subcategoria->id ?>"><?= $subcategoria->nome ?></option>
        <?php
        }
        ?>
    </select>
    <br>

    <label for="Produtos[idmarca]">Marca</label>
    <select name="Produtos[idmarca]" class="form-control">
        <?php
        foreach ($marcas as $marca) {
        ?>
            <option value="<?= $marca->id ?>"><?= $marca->nome ?></option>
        <?php
        }
        ?>
    </select>
    <br>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <label for="Produtos[usado]">Usado</label>
    <select name="Produtos[usado]" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
    </select>
    <br>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true, 'type' => 'number', 'step' => 0.10]) ?>

    <?= $form->field($model, 'stock')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>