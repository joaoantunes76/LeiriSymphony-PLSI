<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model common\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lotacao')->textInput(['type' => 'number', 'maxlength' => 1])->label('Lotação') ?>

    <?= $form->field($model, 'descricao')->textarea(['rows' => 6])->label('Descrição') ?>

    <?= $form->field($model,'data')->widget(DatePicker::classname(),[
        'language' => 'pt',
        'dateFormat' => 'php:Y-m-d',
        'options' => ['class' => 'form-control'],
    ])->label('Data') ?>

    <?= $form->field($model, 'horainicio')->widget(\janisto\timepicker\TimePicker::className(),[
        'language' => 'pt',
        'mode' => 'time',
        'clientOptions'=>[
            'timeFormat' => 'HH:mm',
            'showSecond' => false,
        ]
    ])->label('Hora de Início') ?>

    <?= $form->field($model, 'horafim')->widget(\janisto\timepicker\TimePicker::className(),[
        'language' => 'pt',
        'mode' => 'time',
        'clientOptions'=>[
            'timeFormat' => 'HH:mm',
            'showSecond' => false,
        ]
    ])->label('Hora de Encerramento') ?>

    <p></p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
