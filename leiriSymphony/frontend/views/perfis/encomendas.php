<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */

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
                                <a href="<?= Url::toRoute('perfis/index') ?>">Perfil</a>
                            </li>
                            <li>
                                <a href="<?= Url::toRoute('perfis/encomendas') ?>">Encomendas</a>
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
                                            <p>Estado atual da encomenda: </p>
                                            <p class="text-primary"><?= $encomenda->estado ?></p>
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
                <hr>
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
</section>


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