<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marcas */

$this->title = 'Update Marcas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcas-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
