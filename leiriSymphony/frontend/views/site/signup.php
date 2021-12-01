<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
?>

<div class="text-center ls-mb-10">
    <?= Html::img('@web/logo.png', ['height' => "80px", 'class' => 'logo']); ?>
</div>

<div class="login-register mt-5">
    <div class="row">
        <div class="col">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="text-left mt-5 mb-5">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group field-signupform-password required">
                    <label for="signupform-password">Repetir Password</label>
                    <input type="password" id="signupform-password" class="form-control is-invalid" name="SignupForm[password]" aria-required="true" aria-invalid="true">

                    <div class="invalid-feedback">Password cannot be blank.</div>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Signup', ['class' => 'btn btn-secondary pr-5 pl-5', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>