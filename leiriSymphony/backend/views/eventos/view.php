<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */

$this->title = $model->data;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="eventos-view">

    <h1>Visualização de Evento</h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Apagar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja mesmo apagar este Evento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'ID',
                'value' => $model->id,
            ],
            [
                'label' => 'Lotação',
                'value' => $model->lotacao,
            ],
            [
                'label' => 'Descrição',
                'value' => $model->descricao,
            ],
            [
                'label' => 'Data',
                'value' => $model->data,
            ],
            [
                'label' => 'Hora de Início',
                'value' => date('H:i', strtotime($model->horainicio)),
            ],
            [
                'label' => 'Hora de Encerramento',
                'value' => date('H:i', strtotime($model->horafim)),
            ],
        ],
    ]) ?>

</div>
