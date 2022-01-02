<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
?>

<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>Novo na nossa loja?</h2>
                        <p>A nossa loja tem novos produtos a serem adicionados, junte-se a nós criando uma nova conta</p>
                        <a href="<?= Url::toRoute('site/signup'); ?>" class="btn_3">Criar uma conta</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">

                        <h3>Bem vindo de volta! <br>
                            Por favor, faça o login</h3>

                        <?php $form = ActiveForm::begin(['class' => 'row contact_form']); ?>
                            <div class="col-md-12 form-group p_star">
                                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <?= $form->field($model, 'password')->passwordInput() ?>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                </div>
                                <?= Html::submitButton('Login', ['class' => 'btn_3', 'name' => 'login-button']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

