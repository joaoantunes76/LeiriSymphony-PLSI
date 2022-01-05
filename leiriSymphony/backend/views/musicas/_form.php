<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm \app\models\UploadForm*/
?>

<div class="musicas-form">

    <?php $form = ActiveForm::begin(['id' => 'create-musicas']); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($uploadForm, 'musicFile')->fileInput(['required'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
