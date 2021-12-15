<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */
/* @var $perfis common\models\Perfis */

$this->title = 'Update Encomendas: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomendas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'perfis' => $perfis
    ]) ?>

</div>
