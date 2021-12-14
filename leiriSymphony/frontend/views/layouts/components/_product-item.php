<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $produto common\models\Produtos */

if ($produto->imagens != null) {
    $imagemNome = $produto->imagens[0]->nome;
} else {
    $imagemNome = "";
}
?>


<a class="col ls-product-link d-flex flex-column justify-content-between mb-5" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => $produto->id]) ?>">
    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "154px", 'class' => 'Guitarra-classica']); ?>
    <div>
        <p class="mt-2"><?= $produto->nome ?></p>
        <p><?= $produto->preco ?>€</p>
    </div>
</a>
