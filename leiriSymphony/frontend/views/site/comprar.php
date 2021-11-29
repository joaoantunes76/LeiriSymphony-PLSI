<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Comprar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-comprar">
    <div class="ls-wizzard">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="ls-wizzard-step done">
                    <p>1</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="ls-wizzard-step active">
                    <p>2</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="ls-wizzard-step">
                    <p>3</p>
                </div>
            </div>
        </div>
    </div>
    <form action="">
        <div id="form-step-1" class="d-none">
            <div class="form-group text-center">
                <input type="submit" value="Cancelar" class="btn btn-secondary">
                <button class="btn btn-primary" onclick="goStep2()">Proximo</button>
            </div>
        </div>
        <div id="form-step-2" class="">
            <div class="form-group">
                <label for="Nome">Nome</label>
                <input type="text" class="form-control" name="Nome">
            </div>
            <div class="form-group">
                <label for="Morada">Morada</label>
                <input type="text" class="form-control" name="Morada">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input type="text" class="form-control" name="Email">
            </div>
            <div class="form-group">
                <label for="CodigoPostal">Codigo Postal</label>
                <input type="text" class="form-control" name="CodigoPostal">
            </div>
            <div class="form-group">
                <label for="NIF">NIF</label>
                <input type="text" class="form-control" name="NIF">
            </div>
            <div class="form-group">
                <label for="Telefone">Telefone</label>
                <input type="text" class="form-control" name="Telefone">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-secondary" onclick="goStep1()">Voltar</button>
                <button class="btn btn-info">Preencher Automaticamente</button>
                <button class="btn btn-primary" onclick="goStep3()">Proximo</button>
            </div>
        </div>
        <div id="form-step-3" class="d-none">
            <div class="form-group text-center">
                <button class="btn btn-secondary" goStep2()>Voltar</button>
                <button class="btn btn-info">Preencher Automaticamente</button>
                <button class="btn btn-primary" onclick="">Submit</button>
                <input type="submit" value="Pagar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<script>
    var formStep1 = document.getElementById("form-step-1");
    var formStep2 = document.getElementById("form-step-2");
    var formStep3 = document.getElementById("form-step-3");

    function goStep1() {
        formStep1.classList.remove("d-none");
        formStep2.classList.add("d-none");
    }

    function goStep2() {
        if (formStep3.classList.contains("d-none")) {
            formStep1.classList.add("d-none");
            formStep2.classList.remove("d-none");
        } else {
            formStep3.classList.add("d-none");
            formStep2.classList.remove("d-none");
        }
    }

    function goStep3() {
        formStep2.classList.add("d-none");
        formStep2.classList.remove("d-none");
    }
</script>