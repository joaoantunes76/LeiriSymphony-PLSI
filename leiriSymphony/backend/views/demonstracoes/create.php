<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Demonstracoes */

$this->title = 'Create Demonstracoes';
$this->params['breadcrumbs'][] = ['label' => 'Demonstracoes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demonstracoes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
