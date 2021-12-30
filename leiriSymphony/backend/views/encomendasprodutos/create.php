<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */
/* @var $idproduto */
/* @var $idencomenda */

$this->title = 'Adicionar produto à encomenda';
$this->params['breadcrumbs'][] = ['label' => 'Produtos das encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendasprodutos-create">

    <?= $this->render('_form', [
        'model' => $model,
        'idproduto' => $idproduto,
        'idencomenda' => $idencomenda,
    ]) ?>

</div>
