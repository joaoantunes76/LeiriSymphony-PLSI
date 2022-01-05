<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Marcas */

$this->title = 'Criar Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcas-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
