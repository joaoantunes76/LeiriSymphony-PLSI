<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Imagens */

$this->title = 'Update Imagens: ' . $model->imagemId;
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->imagemId, 'url' => ['view', 'imagemId' => $model->imagemId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="imagens-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
