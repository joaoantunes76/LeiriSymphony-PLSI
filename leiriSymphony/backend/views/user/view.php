<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $perfil common\models\Perfis */

$this->title = 'Conta: '.$model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">


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

    <h3>Conta:</h3>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            [
                'label' => 'Role',
                'attribute' => 'userRole',
            ],
        ],
    ]) ?>

    <h3>Perfil:</h3>
    <?= DetailView::widget([
        'model' => $perfil,
        'attributes' => [
            'nome',
            'nif',
            'endereco',
            'cidade',
            'codigopostal',
            'telefone',
        ],
    ]) ?>

</div>
