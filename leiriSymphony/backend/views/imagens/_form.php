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

    <?php $form = ActiveForm::begin(['id' => 'add-imagem']); ?>

    <?= $form->field($uploadForm, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Adicionar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>