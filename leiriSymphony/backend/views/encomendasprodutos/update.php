<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */
/* @var $idproduto */
/* @var $idencomenda */

$this->title = 'Alterar quantidade: ' . $model->idproduto0->nome;
$this->params['breadcrumbs'][] = ['label' => 'Encomendasprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idencomenda, 'url' => ['view', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="encomendasprodutos-update">


    <?= $this->render('_form', [
        'model' => $model,
        'idproduto' => $idproduto,
        'idencomenda' => $idencomenda,
    ]) ?>

</div>
