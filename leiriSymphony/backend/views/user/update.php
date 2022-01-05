<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $perfis common\models\Perfis */
/* @var $model app\models\User */

$this->title = 'Atualizar Utilizador: ' . $model->email;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <?= $this->render('_form-update', [
        'model' => $model,
        'perfis' => $perfis
    ]) ?>
</div>
