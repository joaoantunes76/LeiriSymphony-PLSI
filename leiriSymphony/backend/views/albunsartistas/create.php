<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Albunsartistas */

$this->title = 'Create Albunsartistas';
$this->params['breadcrumbs'][] = ['label' => 'Albunsartistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="albunsartistas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
