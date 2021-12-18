<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */

$this->title = 'Update Musicas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'idalbuns' => $model->idalbuns]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
