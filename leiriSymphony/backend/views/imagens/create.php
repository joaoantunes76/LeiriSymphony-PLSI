<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Imagens */
/* @var $produtos common\models\Produtos */
/* @var $uploadForm app\models\UploadForm */

$this->title = 'Create Imagens';
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'uploadForm' => $uploadForm,
        'produtos' => $produtos,
    ]) ?>

</div>