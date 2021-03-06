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

    <?php $form = ActiveForm::begin(['id' => 'create-albuns']); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preco')->textInput(['maxlength' => true, 'type' => 'number', 'step' => 0.10])->label('Preço') ?>

    <?= $form->field($model, 'datalancamento')->widget(DatePicker::classname(),[

        'options' => ['class' => 'form-control'],
        'language' => 'pt',
        'dateFormat' => 'php:Y-m-d',
        'class' => 'form-control',
    ])->label('Data de Lançamento') ?>

    <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
