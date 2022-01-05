<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\perfis */

$this->title = 'Update Perfis: ' . $model->perfilId;
$this->params['breadcrumbs'][] = ['label' => 'Perfis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perfilId, 'url' => ['view', 'perfilId' => $model->perfilId, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfis-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
