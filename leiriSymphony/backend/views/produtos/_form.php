<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsubcategoria')->textInput() ?>

    <?= $form->field($model, 'idmarca')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'usado')->textInput() ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
