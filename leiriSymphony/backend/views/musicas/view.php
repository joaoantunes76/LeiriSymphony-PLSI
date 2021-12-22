<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */

$this->title = $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="musicas-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id, 'idalbuns' => $model->idalbuns], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id, 'idalbuns' => $model->idalbuns], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?= Html::a('Ir para Album', ['albuns/view', 'id' => $model->idalbuns], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nome',
            'ficheiro',
            [
              'attribute' => 'idalbuns0.nome',
              'label' => 'Album'
            ],
        ],
    ]) ?>


</div>
