<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm \app\models\UploadForm*/
?>

<div class="demonstracoes-form">

    <?php $form = ActiveForm::begin(['id' => 'add-demo']); ?>

    <?= $form->field($uploadForm, 'demoFile')->fileInput(['required' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
