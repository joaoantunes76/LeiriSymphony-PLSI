<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Albunsartistas */

$this->title = 'Update Albunsartistas: ' . $model->idalbum;
$this->params['breadcrumbs'][] = ['label' => 'Albunsartistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idalbum, 'url' => ['view', 'idalbum' => $model->idalbum, 'idartista' => $model->idartista]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albunsartistas-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
