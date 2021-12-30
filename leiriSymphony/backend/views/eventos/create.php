<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Eventos */

$this->title = 'Create Eventos';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
