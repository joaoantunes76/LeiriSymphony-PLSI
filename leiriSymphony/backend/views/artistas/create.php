<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Artistas */

$this->title = 'Criar Artista';
$this->params['breadcrumbs'][] = ['label' => 'Artistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artistas-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
