<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */

$this->title = $model->idencomenda;
$this->params['breadcrumbs'][] = ['label' => 'Encomendasprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encomendasprodutos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'idencomenda' => $model->idencomenda, 'idproduto' => $model->idproduto], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idencomenda',
            'idproduto',
            'quantidade',
        ],
    ]) ?>

</div>
