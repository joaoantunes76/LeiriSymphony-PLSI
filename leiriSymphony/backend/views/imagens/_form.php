<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Imagens */
/* @var $form yii\widgets\ActiveForm */
/* @var $produtos common\models\Produtos */
/* @var $uploadForm app\models\UploadForm */
?>

<div class="imagens-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <label for="Imagens[idproduto]">Produto</label>
        <select name="Imagens[idproduto]" id="Imagens[idproduto]" class="form-control">
            <?php
            foreach ($produtos as $produto) {
                ?>
                <option value="<?= $produto->id ?>"><?= $produto->nome ?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>