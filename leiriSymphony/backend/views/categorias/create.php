<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Categorias */

$this->title = 'Create Categorias';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
