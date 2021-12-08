<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */

$this->title = 'Create Eventos';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
