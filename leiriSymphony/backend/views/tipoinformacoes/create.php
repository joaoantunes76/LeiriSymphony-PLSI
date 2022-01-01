<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tipoinformacoes */

$this->title = 'Create Tipoinformacoes';
$this->params['breadcrumbs'][] = ['label' => 'Tipoinformacoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoinformacoes-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
