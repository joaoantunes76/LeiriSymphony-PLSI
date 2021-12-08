<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategorias */

$this->title = 'Create Subcategorias';
$this->params['breadcrumbs'][] = ['label' => 'Subcategorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategorias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,

    ]) ?>

</div>