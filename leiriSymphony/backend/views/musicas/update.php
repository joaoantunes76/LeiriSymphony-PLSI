<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Update Musicas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'idalbuns' => $model->idalbuns]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="musicas-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
