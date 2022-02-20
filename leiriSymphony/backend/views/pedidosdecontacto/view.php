<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Pedidosdecontacto */

$this->title = $model->idproblema0->nome.' ('.$model->idproblema0->tipo.')';
$this->params['breadcrumbs'][] = ['label' => 'Pedidosdecontactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pedidosdecontacto-view">

    <p>
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
            'id',
            [
                'attribute' => 'idproblema0',
                'label' => 'Tipo de Contacto',
                'value' => function ($data) {
                    return $data->idproblema0->nome.' ('.$data->idproblema0->tipo.')';
                }
            ],
            [
                'attribute' => 'idperfil0',
                'label' => 'Cliente',
                'value' => function ($data) {
                    return $data->idperfil0->nome;
                }
            ],
            'mensagem:ntext',
            'email:email',
        ],
    ]) ?>

</div>
