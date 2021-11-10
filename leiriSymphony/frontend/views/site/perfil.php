<?php

use yii\bootstrap4\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1>Perfil</h1>
</div>


<?= 
Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
. Html::submitButton(
    'Logout (' . Yii::$app->user->identity->username . ')',
    ['class' => 'btn btn-link logout']
)
. Html::endForm()
?>