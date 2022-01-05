<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model common\models\Carrinho */
/* @var $produtoCarrinho common\models\Carrinho */
/* @var $perfil common\models\Perfis */

/* @var $pagamentoOnline common\models\PagamentoOnline */

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use yii\bootstrap4\ActiveForm;

$this->title = 'Comprar';
?>


<section class="product_list best_seller section_padding">

    <div class="site-comprar">
        <?php $form = ActiveForm::begin(); ?>
        <div class="d-none">
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2>Carrinho de compras</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <?php
                    $i = 0;
                    foreach ($model as $produtoCarrinho) {
                        $produto = $produtoCarrinho->idproduto0;
                        if ($produto->imagens != null) {
                            $imagemNome = $produto->imagens[0]->nome;
                        } else {
                            $imagemNome = "";
                        }
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href="<?= Url::toRoute('produtos/view?produtoId=' . $produto->id) ?>">
                                    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                                </a>
                                <div class="single_product_text">
                                    <h4><?= $produto->nome ?></h4>
                                    <h3><?= $produto->preco ?>€</h3>
                                    <a href="<?= Url::toRoute('produtos/delete-carrinho?idproduto=' . $produto->id) ?>"
                                       class="add_cart">- remover do carrinho</a>
                                    <input type="number" id="quantidade" class=" single-input" min="1"
                                           name="<?= $i ?>[quantidade]"
                                           value="<?= $produtoCarrinho->quantidade ?>">
                                    <input type="hidden" name="<?= $i ?>[id]" value="<?= $produtoCarrinho->idproduto ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="form-step-1" class="">
            <div class="text-center mb-5">
                <h3>Endereço para faturação e entrega</h3>
            </div>
            <div class="form-faturacao p-5">
                <div class="form-group">
                    <label for="Nome">Nome</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->nome ?>" id="Nome">
                </div>
                <div class="form-group">
                    <label for="Morada">Morada</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->endereco ?>" id="Morada">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->iduser0->email ?>" id="Email">
                </div>
                <div class="form-group">
                    <label for="CodigoPostal">Codigo Postal</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->codigopostal ?>"
                           id="CodigoPostal">
                </div>
                <div class="form-group">
                    <label for="NIF">NIF</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->nif ?>" id="NIF">
                </div>
                <div class="form-group">
                    <label for="Telefone">Telefone</label>
                    <input type="text" class="form-control" disabled value="<?= $perfil->telefone ?>" id="Telefone">
                </div>
            </div>
            <div class="form-group text-center">
                <a class="genric-btn info radius" href="<?= Url::toRoute('perfis/index') ?>">Alterar perfil</a>
                <a class="genric-btn success radius" href="#step3" onclick="goStep2()">Proximo</a>
            </div>
        </div>
        <div id="form-step-2" class="d-none">
            <div class="text-center mb-5">
                <h3>Pagamento</h3>
            </div>
            <div class="form-pagamento p-5 ">
                <div class="form-group">
                    <label for="entrega">Entrega</label>
                    <select name="entrega" id="" class="form-control">
                        <option value="Levantamento em loja">Em loja</option>
                        <option value="'Envio">Correio</option>
                    </select>
                </div>
                <br>
                <div class="form-group mt-5">
                    <label for="pagamento">Pagamento</label>
                    <select name="pagamento" id="pagamento" class="form-control" onchange="checkPaymentMethod()">
                        <option value="pagamentoloja">Em loja</option>
                        <option value="online">Online</option>
                    </select>
                </div>
                <div id="pagamentoOnline" class="d-none mt-5">
                    <br>
                    <?= $form->field($pagamentoOnline, 'nome')->textInput() ?>
                    <?= $form->field($pagamentoOnline, 'numero')->textInput() ?>
                    <?= $form->field($pagamentoOnline, 'validade')->textInput() ?>
                    <?= $form->field($pagamentoOnline, 'cvv')->textInput() ?>
                </div>
            </div>
            <div class="form-group text-center">
                <a class="genric-btn primary radius" href="#step2" onclick="goStep1()">Voltar</a>
                <?= Html::submitButton('Pagar', ['class' => 'genric-btn success radius']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>

<script>
    var formStep1 = document.getElementById("form-step-1");
    var formStep2 = document.getElementById("form-step-2");

    function goStep1() {
        formStep1.classList.remove("d-none");
        formStep2.classList.add("d-none");
    }

    function goStep2() {
        formStep2.classList.remove("d-none");
        formStep1.classList.add("d-none");
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