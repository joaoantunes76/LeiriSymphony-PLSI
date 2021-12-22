<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Update Albuns: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Albuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albuns-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
