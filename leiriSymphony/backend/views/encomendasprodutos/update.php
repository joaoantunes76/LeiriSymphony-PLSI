<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */

$this->title = 'Update Encomendasprodutos: ' . $model->idencomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendasprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idencomenda, 'url' => ['view', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomendasprodutos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
