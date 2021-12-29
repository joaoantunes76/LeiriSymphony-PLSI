<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $form yii\widgets\ActiveForm */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="albuns-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'datalancamento')->widget(DatePicker::classname(),[

        'options' => ['class' => 'form-control'],
        'language' => 'pt',
        'dateFormat' => 'php:Y-m-d',
        'class' => 'form-control',
    ]) ?>

    <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
