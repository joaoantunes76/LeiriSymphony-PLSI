<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Criar Albuns';
$this->params['breadcrumbs'][] = ['label' => 'Albuns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albuns-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
    ]) ?>

</div>
