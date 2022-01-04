<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */

$this->title = 'Criar Produtos';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-create">

    

    <?= $this->render('_form', [
        'model' => $model,
        'marcas' => $marcas,
        'subcategorias' => $subcategorias,
    ]) ?>

</div>