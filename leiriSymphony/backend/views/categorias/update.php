<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categorias */

$this->title = 'Editar Categoria: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorias-update">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
