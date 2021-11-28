<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-2">
            <a href="<?= Url::toRoute("site/perfil") ?>" class="btn btn-link">Perfil</a>
            <br>
            <a href="<?= Url::toRoute("site/encomendas") ?>" class="btn btn-link">Encomendas</a>
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
            <div class="ls-encomenda">
                <div class="row">
                    <div class="col">
                        <p>28/11/2021</p>
                        <p><span>Leiria</span> <span class="ml-5">Rua 25 de Abril</span></p>
                        <p>2410-010</p>
                        <p>910 000 000</p>
                        <p>123456789</p>
                    </div>
                    <div class="col">
                        <p>Produtos:</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <div class="d-flex justify-content-end">
                            <p>249.99 €</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="ls-encomenda">
                <div class="row">
                    <div class="col">
                        <p>17/10/2021</p>
                        <p><span>Leiria</span> <span class="ml-5">Rua 25 de Abril</span></p>
                        <p>2410-010</p>
                        <p>910 000 000</p>
                        <p>123456789</p>
                    </div>
                    <div class="col">
                        <p>Produtos:</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <button data-toggle="modal" data-target="#modelId" class="btn btn-link ls-text-primary">...</button>
                        <div class="d-flex justify-content-end">
                            <p>449.99 €</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="ls-encomenda">
                <div class="row">
                    <div class="col">
                        <p>13/09/2021</p>
                        <p><span>Leiria</span> <span class="ml-5">Rua 25 de Abril</span></p>
                        <p>2410-010</p>
                        <p>910 000 000</p>
                        <p>123456789</p>
                    </div>
                    <div class="col">
                        <p>Produtos:</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <p>Guitarra Classica - 1x</p>
                        <button data-toggle="modal" data-target="#modelId" class="btn btn-link ls-text-primary">...</button>
                        <div class="d-flex justify-content-end">
                            <p>449.99 €</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ls-mvw-40" role="document">
        <div class="modal-content">
            <div class="text-center p-3">
                <h5 class="modal-title">Detalhes da encomenda</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <p>13/09/2021</p>
                            <p><span>Leiria</span> <span class="ml-5">Rua 25 de Abril</span></p>
                            <p>2410-010</p>
                            <p>910 000 000</p>
                            <p>123456789</p>
                            <br>
                            <p>Produtos:</p>
                            <p><a href="#" class="ls-text-primary">Guitarra Classica - 1x</a></p>
                            <p><a href="#" class="ls-text-primary">Guitarra Classica - 1x</a></p>
                            <p><a href="#" class="ls-text-primary">Guitarra Classica - 1x</a></p>
                        </div>
                        <div class="col">
                            <p>Estado Atual da encomenda: <span class="ls-text-primary">Entregue</span></p>
                            <div class="ls-encomenda-estado">
                                <br>
                                <p>Estados da encomenda</p>
                                <br>
                                <p>01/11/2021</p>
                                <p>Em Processamento</p>
                                <br>
                                <p>02/11/2021</p>
                                <p>Expedida</p>
                                <br>
                                <p>03/11/2021</p>
                                <p>Entregue</p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <p>Preço total: 449.99€</p>
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