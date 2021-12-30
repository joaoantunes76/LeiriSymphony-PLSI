<?php

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Perfis */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-2">
            <a href="<?= Url::toRoute("perfis/index") ?>" class="btn btn-link">Perfil</a>
            <br>
            <a href="<?= Url::toRoute("perfis/encomendas") ?>" class="btn btn-link">Encomendas</a>
            <?=
            Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout mt-5']
            )
            . Html::endForm()
            ?>
        </div>
        <div class="col-8">
            <div class="ls-form text-center">
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
        </div>
    </div>
</div>

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