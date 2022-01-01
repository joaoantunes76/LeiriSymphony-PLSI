<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Signup';
?>

<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Já tem conta?</h2>
                        <p>Se já tem conta na nossa loja, pode clicar aqui para fazer o login</p>
                        <a href="<?= Url::toRoute('site/login'); ?>" class="btn_3">Fazer login</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">

                        <?php $form = ActiveForm::begin(['class' => 'row contact_form']); ?>
                        <div class="col-md-12 form-group p_star">
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <?= $form->field($model, 'email') ?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <?= $form->field($model, 'password')->passwordInput() ?>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <?= $form->field($model, 'password')->passwordInput()->label('Repetir password') ?>
                        </div>
                        <div class="col-md-12 form-group">
                            <?= Html::submitButton('Criar Conta', ['class' => 'btn_3', 'name' => 'login-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->