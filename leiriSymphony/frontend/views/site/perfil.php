<?php

use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-2">
            <a href="#" class="btn btn-link">Perfil</a>
            <br>
            <a href="#" class="btn btn-link">Encomendas</a>
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
                <h1 class="m-5 ls-text-primary">Perfil</h1>

                <form action="" class="text-left">
                    <div class="form-group">
                        <label for="">Nome:</label>
                        <input type="text" class="form-control" name="nome" id="nome" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Endereço:</label>
                        <input type="text" class="form-control" name="endereco" id="endereco" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Código Postal</label>
                        <input type="text" class="form-control" name="codigoPostal" id="codigoPostal" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Telefone</label>
                        <input type="number" class="form-control" name="telefone" id="telefone" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">NIF</label>
                        <input type="number" class="form-control" name="nif" id="nif" disabled>
                    </div>
                    <div class="form-group text-center mt-5">
                        <a href="#" id="enableForm" onclick="enableForm()" class="btn btn-primary pr-5 pl-5">Editar</a>
                        <input type="submit" value="Guardar" id="submit" class="btn btn-primary pr-5 pl-5 d-none">
                    </div>
                </form>
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