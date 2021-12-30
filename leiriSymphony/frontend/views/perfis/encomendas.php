<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */

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
            <?php
                foreach($model as $encomenda){
            ?>
            <div class="modal fade" id="model<?= $encomenda->id ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ls-mvw-40" role="document">
                    <div class="modal-content">
                        <div class="text-center p-3">
                            <h5 class="modal-title">Detalhes da encomenda</h5>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <p>Data: <span class="ml-2"><?= $encomenda->data ?></span></p>

                                        <p>Morada: <span class="ml-2"><?= $encomenda->idperfil0->cidade ?> - <?= $encomenda->idperfil0->endereco ?></span></p>

                                        <p>Codigo Postal: <span class="ml-2"><?= $encomenda->idperfil0->codigopostal ?></span></p>

                                        <p>Telefone: <span class="ml-2"><?= $encomenda->idperfil0->telefone ?></span></p>

                                        <p>Nif: <span class="ml-2"><?= $encomenda->idperfil0->nif ?></span></p>
                                        <br>
                                    </div>
                                    <div class="col">
                                        <p>Produtos:</p>
                                        <?php
                                        foreach ($encomenda->encomendasprodutos as $encomendasproduto){
                                            ?>
                                            <p><a href="<?= Url::toRoute('produtos/view?produtoId='.$encomendasproduto->idproduto)?>" class="ls-text-primary"><?= $encomendasproduto->idproduto0->nome ?> - <?= $encomendasproduto->quantidade ?>x</a></p>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Estado Atual da encomenda: <span class="ls-text-primary">Entregue</span></p>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex justify-content-end">
                                            <p>Preço total: <?= $encomenda->preco ?>€</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center p-3">
                            <button type="button" class="btn btn-primary pl-5 pr-5" data-dismiss="modal">Sair</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ls-encomenda">
                <div class="row">
                    <div class="col">
                        <p>Data: <span class="ml-2"><?= $encomenda->data ?></span></p>
                        <p>Morada: <span class="ml-2"><?= $encomenda->idperfil0->cidade ?> - <?= $encomenda->idperfil0->endereco ?></span></p>
                        <p>Codigo Postal: <span class="ml-2"><?= $encomenda->idperfil0->codigopostal ?></span></p>
                        <p>Telefone: <span class="ml-2"><?= $encomenda->idperfil0->telefone ?></span></p>
                        <p>Nif: <span class="ml-2"><?= $encomenda->idperfil0->nif ?></span></p>
                    </div>
                    <div class="col">
                        <p>Produtos:</p>
                        <?php
                        foreach ($encomenda->encomendasprodutos as $encomendasproduto){
                        ?>
                            <p><?= $encomendasproduto->idproduto0->nome ?> - <?= $encomendasproduto->quantidade ?>x</p>
                        <?php
                        }
                        ?>
                        <button data-toggle="modal" data-target="#model<?= $encomenda->id ?>" class="btn btn-primary ls-text-primary">Detalhes</button>
                        <div class="d-flex justify-content-end">
                            <p><?= $encomenda->preco ?>€</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<!-- Modal -->


<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>

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