<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tipoinformacoes */

$this->title = 'Editar Tipo de contacto: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Tipoinformacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipoinformacoes-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
