<?php
$this->title = 'Página Inicial';
$this->params['breadcrumbs'] = [['label' => $this->title]];
/* @var $mensagensDisponiveis */
?>
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Novas encomendas</p>
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
                    <h3>53000€</h3>

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
</div>