<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategorias */
/* @var $categorias common\models\Categorias */

$this->title = 'Criar Subcategoria';
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategorias-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,

    ]) ?>

</div>