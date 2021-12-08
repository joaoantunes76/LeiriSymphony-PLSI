<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr>
                <td><b>ID</b></td>
                <td><?= $model->id ?></td>
            </tr>
            <tr>
                <td><b>SubCategoria</b></td>
                <td><?= $model->idsubcategoria0->nome ?></td>
            </tr>
            <tr>
                <td><b>Marca</b></td>
                <td><?= $model->idmarca0->nome ?></td>
            </tr>
            <tr>
                <td><b>Nome</b></td>
                <td><?= $model->nome ?></td>
            </tr>
            <tr>
                <td><b>Descrição</b></td>
                <td><?= $model->descricao ?></td>
            </tr>
            <tr>
                <td><b>Usado</b></td>
                <td><?= $model->usado ? "Sim" : "Não" ?></td>
            </tr>
            <tr>
                <td><b>Preço</b></td>
                <td><?= $model->preco ?></td>
            </tr>
            <tr>
                <td><b>Stock</b></td>
                <td><?= $model->stock ?></td>
            </tr>
        </tbody>
    </table>

</div>