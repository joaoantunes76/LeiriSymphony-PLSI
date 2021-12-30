<?php

use yii\helpers\Html;

/* @var $model common\models\Eventos */
/* @var $lugaresRestantes common\models\Eventosperfis */

$this->title = 'Evento';
?>
<div class="evento">
    <div class="row">
        <?= Html::img('@web/images/Sample-Event.png', ['class' => 'ls-logo d-block w-100', 'alt' => "First slide"]); ?>
    </div>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-8">
            <h4>Descrição do evento</h4>
            <p><?= $model->descricao ?></p>
            <p>Data: <?= $model->data ?></p>
            <p>Hora de Inicio: <?= $model->horainicio ?></p>
            <p>Hora de Fim: <?= $model->horafim ?></p>
            <p>Lotação: <?= $model->lotacao ?></p>
            <p>Lugares Restantes: <?= $lugaresRestantes ?></p>
        </div>
    </div>



    <div class="row d-flex justify-content-center">
        <button class="btn btn-primary pl-5 pr-5" data-toggle="modal" data-target="#reservarEvento">Reservar</button>
    </div>

    <div class="modal fade" id="reservarEvento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="row">
                        <div class="col">
                            <?= Html::img('@web/images/qr-code.png', ['alt' => "QR-Code", 'height' => '256px']); ?>
                        </div>
                        <div class="col d-flex flex-column justify-content-center">
                            <h4>Instruções</h4>
                            Utilize a app do telemovel para digitalizar o QR-Code
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-primary pl-5 pr-5" data-dismiss="modal">Sair</button>
                </div>
            </div>
        </div>
    </div>
</div>