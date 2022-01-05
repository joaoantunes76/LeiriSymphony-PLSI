<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Criar Música';
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicas-create">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
