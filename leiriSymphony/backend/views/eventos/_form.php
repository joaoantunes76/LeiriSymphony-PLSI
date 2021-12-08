<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-form">

    <?php $form = ActiveForm::begin(); ?>

    <p></p>
    <label for="Eventos[lotacao]">Lotação</label>
    <br>
    <input type="number" name="Eventos[lotacao]">
    
    <p></p>
    <?= $form->field($model, 'descricao')->textarea(['rows' => 6]) ?>

    <label for="Eventos[data]">Data</label>
    <br>
    <input type="date" name="Eventos[data]">
    
    <p></p>
    <label for="Eventos[horainicio]">Hora de Início</label>
    <br>
    <input type="time" name="Eventos[horainicio]">

    <p></p>
    <label for="Eventos[horafim]">Hora de Fim</label>
    <br>
    <input type="time" name="Eventos[horafim]">

    <p></p>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
