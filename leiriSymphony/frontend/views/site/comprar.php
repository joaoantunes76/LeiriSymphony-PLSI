<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use yii\bootstrap4\ActiveForm;

$this->title = 'Comprar';
?>
<div class="site-comprar">
    <div class="ls-wizzard">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div id="wizzard-step-1" class="ls-wizzard-step active">
                    <p>1</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div id="wizzard-step-2" class="ls-wizzard-step ">
                    <p>2</p>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div id="wizzard-step-3" class="ls-wizzard-step">
                    <p>3</p>
                </div>
            </div>
        </div>
    </div>
    <form action="" class="mt-5 ls-form">
        <div id="form-step-1" class="">
            <div class="text-center mb-5">
                <h3>Confirmar produtos da lista de compras</h3>
            </div>
            <div class="form-produtos">
                <?php
                    $produtosCarrinho = \common\models\Carrinho::find()->where(['idperfil'=> Yii::$app->user->id])->all();
                    foreach ($produtosCarrinho as $produtoCarrinho){
                        $produto = \common\models\Produtos::find()->where(['id' => $produtoCarrinho->idproduto])->one();
                ?>
                    <div class="form-group d-flex align-items-center">
                        <?= Html::img(Yii::getAlias('@imageurl') . '/' . $produto->imagens[0]->nome, ['height' => "126px", 'class' => 'logo']); ?>
                        <label ><?= Html::encode($produto->nome)?>  <?= Html::encode($produto->preco)?>€</label>
                        <input type="number" id="quantidade" class="form-control ml-2" min="1" value="<?= $produtoCarrinho->quantidade ?>">
                    </div>
                <?php
                    }
                ?>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Cancelar" class="btn btn-secondary">
                <a class="btn btn-primary" onclick="goStep2()">Proximo</a>
            </div>
        </div>
        <div id="form-step-2" class="d-none">
            <div class="text-center mb-5">
                <h3>Endereço para faturação e entrega</h3>
            </div>
            <div class="form-faturacao">
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
            </div>
            <div class="form-group text-center">
                <a class="btn btn-secondary" onclick="goStep1()">Voltar</a>
                <a class="btn btn-info">Preencher Automaticamente</a>
                <a class="btn btn-primary" onclick="goStep3()">Proximo</a>
            </div>
        </div>
        <div id="form-step-3" class="d-none">
            <div class="text-center mb-5">
                <h3>Pagamento</h3>
            </div>
            <div class="form-pagamento">
                <div class="form-group">
                    <label for="pagamento">Pagamento</label>
                    <select name="pagamento" id="pagamento" class="form-control" onchange="checkPaymentMethod()">
                        <option value="pagamentoloja">Em loja</option>
                        <option value="online">Online</option>
                    </select>
                </div>
                <div id="pagamentoOnline" class="d-none">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label for="numerocartao" id="numerocartaolabel">Numero do Cartão</label>
                        <input type="number" class="form-control" name="numerocartao" id="numerocartao" onkeyup="checkCardNumber()">
                    </div>
                    <div class="form-group">
                        <label for="datavalidade">Data de Validade</label>
                        <input type="number" class="form-control" name="datavalidade">
                    </div>
                    <div class="form-group">
                        <label for="codigocartao">CVV/CVV2</label>
                        <input type="number" class="form-control" name="codigocartao">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="entrega">Entrega</label>
                    <select name="entrega" id="" class="form-control">
                        <option value="entregaloja">Em loja</option>
                        <option value="correio">Correio</option>
                    </select>
                </div>
            </div>
            <div class="form-group text-center">
                <a class="btn btn-secondary" onclick="goStep2()">Voltar</a>
                <input type="submit" value="Pagar" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<script>
    var formStep1 = document.getElementById("form-step-1");
    var formStep2 = document.getElementById("form-step-2");
    var formStep3 = document.getElementById("form-step-3");

    var wizzardStep1 = document.getElementById("wizzard-step-1");
    var wizzardStep2 = document.getElementById("wizzard-step-2");
    var wizzardStep3 = document.getElementById("wizzard-step-3");

    function goStep1() {
        formStep1.classList.remove("d-none");
        formStep2.classList.add("d-none");
        wizzardStep2.classList.remove("active")
    }

    function goStep2() {
        if (formStep3.classList.contains("d-none")) {
            formStep1.classList.add("d-none");
            formStep2.classList.remove("d-none");
            wizzardStep1.classList.remove("active")
            wizzardStep1.classList.add("done")
            wizzardStep2.classList.add("active")
        } else {
            formStep3.classList.add("d-none");
            formStep2.classList.remove("d-none");
            wizzardStep3.classList.remove("active")
            wizzardStep2.classList.remove("done")
            wizzardStep2.classList.add("active")
        }
    }

    function goStep3() {
        formStep2.classList.add("d-none");
        formStep3.classList.remove("d-none");
        wizzardStep2.classList.remove("active")
        wizzardStep2.classList.add("done")
        wizzardStep3.classList.add("active")
    }

    function checkCardNumber() {
        var numeroCartao = document.getElementById("numerocartao").value;
        var numeroCartaoLabel = document.getElementById("numerocartaolabel");
        if (checkForMasterCard(numeroCartao)) {
            numeroCartaoLabel.innerHTML = "Numero do Cartão (MasterCard)"
        } else {
            if (checkForVisa(numeroCartao)) {
                numeroCartaoLabel.innerHTML = "Numero do Cartão (Visa)"
            } else {
                numeroCartaoLabel.innerHTML = "Numero do Cartão (Não é valido)"
            }
        }
    }

    function checkPaymentMethod() {
        var pagamento = document.getElementById("pagamento");
        var pagamentoOnline = document.getElementById("pagamentoOnline");

        if (pagamento.value == "online") {
            pagamentoOnline.classList.remove("d-none");
        } else {
            pagamentoOnline.classList.add("d-none");
        }
    }


    function checkForMasterCard(numeroCartao) {
        var cardno = /^(?:5[1-5][0-9]{14})$/;
        if (numeroCartao.match(cardno)) {
            return true;
        } else {
            return false;
        }
    }

    function checkForVisa(numeroCartao) {
        var cardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
        if (numeroCartao.match(cardno)) {
            return true;
        } else {
            return false;
        }
    }
</script>