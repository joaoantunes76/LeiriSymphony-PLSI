<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Editar Album: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Albuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albuns-update">

    

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
