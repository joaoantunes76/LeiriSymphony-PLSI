<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Encomendasprodutos */

$this->title = 'Create Encomendasprodutos';
$this->params['breadcrumbs'][] = ['label' => 'Encomendasprodutos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendasprodutos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
