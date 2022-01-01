<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Criar Demonstrações';
$this->params['breadcrumbs'][] = ['label' => 'Demonstracoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demonstracoes-create">

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
