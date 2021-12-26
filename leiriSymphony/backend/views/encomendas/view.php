<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendas */
/* @var $searchModel common\models\EncomendasprodutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Encomenda: ".$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="encomendas-view">

    

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
            [
                'attribute'=>'idperfil0',
                'label' => 'Cliente',
                'value' => function ($data) {
                    return $data->idperfil0->nome;
                }
            ],
            'estado',
            [
                'attribute'=>'pago',
                'label' => 'Pago',
                'value' => function ($data) {
                    return $data->pago ? "Sim" : "Não";
                }
            ],
            [
                'attribute'=>'preco',
                'label' => 'Preço',
                'value' => function ($data) {
                    return $data->preco."€";
                }
            ],
            [
                'attribute'=>'tipoexpedicao',
                'label' => 'Tipo de Expedição',
                'value' => function ($data) {
                    return $data->tipoexpedicao;
                }
            ],
        ],
    ]) ?>


    <p>
        <?= Html::a('Adicionar Produto', ['encomendasprodutos/create', 'encomendaid' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'idproduto0',
                'label' => 'Produto',
                'value' => 'idproduto0.nome',
                'format' => ['text'],
            ],
            'quantidade',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
