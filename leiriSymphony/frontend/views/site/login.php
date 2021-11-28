<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
?>

<div class="text-center ls-mb-10">
    <?= Html::img('@web/logo.png', ['height' => "80px", 'class' => 'logo']); ?>
</div>

<div class="login-register mt-5">
    <div class="row">
        <div class="col">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="text-left mt-5 mb-5">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <span><a href="<?= Url::toRoute('site/signup'); ?>">Click here</a> to create an account</span>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-secondary pr-5 pl-5', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>