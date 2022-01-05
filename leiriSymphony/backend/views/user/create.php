<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $perfis common\models\Perfis */
/* @var $signup frontend\models\SignupForm */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    

    <?= $this->render('_form', [
        'perfis' => $perfis,
        'signup' => $signup
    ]) ?>

</div>
