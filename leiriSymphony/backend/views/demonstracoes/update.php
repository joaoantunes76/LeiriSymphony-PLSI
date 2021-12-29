<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Editar Demonstração: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Demonstracoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'idproduto' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demonstracoes-update">



    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm
    ]) ?>

</div>
