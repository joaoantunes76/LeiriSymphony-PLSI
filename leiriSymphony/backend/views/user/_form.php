<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $perfis common\models\Perfis */
/* @var $signup frontend\models\SignupForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <label for="Roles">Roles</label>
    <select name="Roles" id="Roles" class="form-control">
        <?php
        $roles = Yii::$app->authManager->getRoles();
        foreach($roles as $role){
            ?>
            <option value="<?= $role->name ?>"><?= $role->name ?></option>
            <?php
        }
        ?>
    </select>
    <br>

    <?= $form->field($signup, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($signup, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($signup, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'nif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'codigopostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfis, 'telefone')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
