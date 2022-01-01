<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */
/* @var $searchModel common\models\DemonstracoesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <p class="mt-4">
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Adicionar Imagem', ['imagens/create', 'idproduto' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="d-flex">
        <div id="carouselExampleControls" class="carousel slide mr-3" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $first = true;
                    foreach($model->imagens as $imagem){
                ?>
                    <div class="carousel-item <?= $first ? "active" : "" ?>">
                        <?= Html::img("@web/uploads/$imagem->nome", ['height' => '345px', 'class' => 'rounded']) ?>
                        <div class="row justify-content-center">
                            <?= Html::a('Remover Imagem', ['imagens/delete', 'id' => $imagem->id], ['class' => 'btn btn-danger mt-4', 'data' => ['method' => 'post']]) ?>
                        </div>
                    </div>
                <?php
                        $first = false;
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" style="height: 30px" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" style="height: 30px" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'idsubcategoria0',
                    'label' => 'Subcategoria',
                    'value' => function($data){
                        return $data->idsubcategoria0->nome;
                    }
                ],
                'nome',
                'descricao',
                [
                    'attribute' => 'idmarca0',
                    'label' => 'Marca',
                    'value' => function($data){
                        return $data->idmarca0->nome;
                    }
                ],
                [
                    'attribute' => 'usado',
                    'label' => 'Usado',
                    'value' => function($data){
                        return $data->usado == 0 ? 'Não' : 'Sim';
                    }
                ],
                [
                    'attribute' => 'preco',
                    'label' => 'Preço',
                    'value' => function($data){
                        return $data->preco.'€';
                    }
                ],
                'stock',
            ],
        ]) ?>
    </div>

    <br>
    <p>
        <?= Html::a('Adicionar Demonstração', ['demonstracoes/create?produtoId='.$model->id], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'nome',
            [
                'label' => 'Demonstracao',
                'format' => 'raw',
                'value' => function($data) {
                    if($data->nome != ""){
                        return '<audio controls><source src="http://leirysymphony-be/uploads/demos/'.$data->nome.'" type="audio/ogg"></audio>';
                    }
                    else {
                        return "";
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [],
                'template' => '{view} {update} {delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    return Url::to(['demonstracoes/'.$action, 'id' => $model->id, 'idproduto' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>