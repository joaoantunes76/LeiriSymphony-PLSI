<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Musicas */

$this->title = 'Create Musicas';
$this->params['breadcrumbs'][] = ['label' => 'Musicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="musicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
