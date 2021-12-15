<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategorias */
/* @var $form yii\widgets\ActiveForm */
/* @var $categorias common\models\Categorias */
?>

<div class="subcategorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <label for="Subcategorias[idcategoria]">Categoria</label>
    <select name="Subcategorias[idcategoria]" class="form-control">
        <?php
        foreach ($categorias as $categoria) {
        ?>
            <option value="<?= $categoria->id ?>" <?= $categoria->id == $model->idcategoria ? 'selected' : "" ?>><?= $categoria->nome ?></option>
        <?php
        }
        ?>
    </select>
    <br>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>