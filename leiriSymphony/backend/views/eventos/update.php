<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */

$this->title = 'Editar Evento: ' . $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
