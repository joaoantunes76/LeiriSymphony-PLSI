<?php

use yii\grid\GridView;

$this->title = 'Página Inicial';
$this->params['breadcrumbs'] = [['label' => $this->title]];
/* @var $mensagensDisponiveis */
/* @var $lucroMensal */
/* @var $possivelLucroMensal */
/* @var $numEncomendasDoMes */
/* @var $searchModel common\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $numEncomendasDoMes ?></h3>

                    <p><?= $numEncomendasDoMes == 1 ? 'Nova encomenda' : 'Novas encomendas' ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $lucroMensal ?>€</h3>

                    <p>Faturação mensal</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $possivelLucroMensal ?>€</h3>

                    <p>Possivel Faturação mensal</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= $mensagensDisponiveis ?></h3>

                    <p><?= $mensagensDisponiveis == 1 ? 'Mensagem de um utilizador' : 'Mensagens dos utlizadores' ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>

    </div>
    <!-- /.row (main row) -->
    <div>
        <h3 class="ml-2">Produtos fora de stock:</h3>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'attribute' => 'idsubcategoria0',
                    'label' => 'Subcategoria',
                    'value' => 'idsubcategoria0.nome',
                    'format' => ['text'],
                ],
                [
                    'attribute' => 'idmarca0',
                    'label' => 'Marca',
                    'value' => 'idmarca0.nome',
                    'format' => ['text'],
                ],
                'nome',
                [
                    'attribute' => 'usado',
                    'label' => 'Usado',
                    'value' => function ($data){
                        return $data->usado == 0 ? 'Não' : 'Sim';
                    },
                ],
                'preco',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);  ?>
    </div>
</div>