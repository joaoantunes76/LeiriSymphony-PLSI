<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Perfis */

$this->title = 'My Yii Application';
?>


<section class="section_padding">
    <div class="row">
        <div class="col-lg-3">
            <div class="left_sidebar_area">
                <aside class="left_widgets p_filter_widgets">
                    <div class="widgets_inner">
                        <ul class="list">
                            <li>
                                <a href="#">Perfil</a>
                            </li>
                            <li>
                                <a href="#">Encomendas</a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <aside class="left_widgets p_filter_widgets">
                    <div class="l_w_title">
                    </div>
                    <div class="widgets_inner">
                        <ul class="list">
                            <li>
                                <?= Html::a('Logout (' . Yii::$app->user->identity->username . ')', ['site/logout'], ['data' => ['method' => 'post']]) ?>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>

        <div class="col-lg-6">
            <h1 class="ls-text-primary">Perfil</h1>

            <?php $form = ActiveForm::begin(); ?>
            <div class="form-group text-left">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" value="<?= $model->nome ?>" name="Perfis[nome]" id="nome" disabled>
            </div>
            <div class="form-group text-left">
                <label for="endereco">Endereço:</label>
                <input type="text" class="form-control" value="<?= $model->endereco ?>" name="Perfis[endereco]" id="endereco" disabled>
            </div>
            <div class="form-group text-left">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" value="<?= $model->cidade ?>" name="Perfis[cidade]" id="cidade" disabled>
            </div>
            <div class="form-group text-left">
                <label for="codigoPostal">Código Postal:</label>
                <input type="text" class="form-control" value="<?= $model->codigopostal ?>" name="Perfis[codigopostal]" id="codigoPostal" disabled>
            </div>
            <div class="form-group text-left">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" value="<?= $model->telefone ?>" name="Perfis[telefone]" id="telefone" disabled>
            </div>
            <div class="form-group text-left">
                <label for="nif">NIF:</label>
                <input type="number" class="form-control" value="<?= $model->nif ?>" name="Perfis[nif]" id="nif" disabled>
            </div>
            <div class="form-group">
                <a href="#" id="enableForm" onclick="enableForm()" class="btn btn-primary pr-5 pl-5">Editar</a>
            </div>
            <div class="form-group d-none" id="submit">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success pr-5 pl-5']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

</section>

<script>
    function enableForm() {
        document.getElementById("nome").disabled = false;
        document.getElementById("endereco").disabled = false;
        document.getElementById("cidade").disabled = false;
        document.getElementById("codigoPostal").disabled = false;
        document.getElementById("telefone").disabled = false;
        document.getElementById("nif").disabled = false;

        document.getElementById("enableForm").classList.add("d-none");
        document.getElementById("submit").classList.remove("d-none");
    }
</script>