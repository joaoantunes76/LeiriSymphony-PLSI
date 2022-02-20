<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\Pedidosdecontacto */
/* @var $tipoInformacoes \common\models\Tipoinformacoes */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>

<section class="section_padding text-center">
    <h2>Pedido de Contacto</h2>
    <p>Insira o seu problema/duvida e nós entraremos em contacto consigo, por email</p>
    <br>
    <div class="row justify-content-center text-left">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(); ?>
                <div class="form-group">
                    <label for="Pedidosdecontacto[idproblema]">Tipo</label>
                    <select name="Pedidosdecontacto[idproblema]" id="Pedidosdecontacto[idproblema]" class="form-control mb-3">
                        <?php
                        foreach($tipoInformacoes as $tipoInformacao){
                            ?>
                            <option value="<?= $tipoInformacao->id ?>"><?= $tipoInformacao->nome?> (<?= $tipoInformacao->tipo ?>)</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Pedidosdecontacto[email]">Email</label>
                    <input name="Pedidosdecontacto[email]" id="Pedidosdecontacto[email]" class="single-input">
                </div>

                <div class="form-group">
                    <label for="Pedidosdecontacto[mensagem]">Mensagem</label>
                    <textarea name="Pedidosdecontacto[mensagem]" id="Pedidosdecontacto[mensagem]" class="single-textarea"></textarea>
                </div>



                <div class="form-group text-center">
                    <?= Html::submitButton('Submeter', ['class' => 'btn_3', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</section>

<script>

</script>

