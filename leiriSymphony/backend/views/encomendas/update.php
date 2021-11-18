<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Encomendas */

$this->title = 'Update Encomendas: ' . $model->encomendaId;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->encomendaId, 'url' => ['view', 'encomendaId' => $model->encomendaId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
