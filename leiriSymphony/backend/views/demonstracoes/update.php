<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */

$this->title = 'Update Demonstracoes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Demonstracoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demonstracoes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
