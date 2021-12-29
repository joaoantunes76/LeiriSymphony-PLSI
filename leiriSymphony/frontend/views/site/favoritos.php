<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Produtosfavoritos */
/* @var $produtoFavorito \common\models\Produtosfavoritos */

$this->title = 'Itens Favoritos';
?>
<div class="site-index">
    <h1 class="ls-text-primary">Itens Favoritos</h1>

    <div class="body-content mt-5">
        <div class="row mt-3">
            <?php
                foreach ($model as $produtoFavorito){
            ?>
                <div class="col text-right">
                    <?php echo Html::a('<i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i>',['produtos/add-favorito', 'idproduto' => $produtoFavorito->idproduto], ['class' => 'btn btn-black', 'title' => 'Remover dos favoritos']); ?>
                    <div class="text-left">
                        <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => $produtoFavorito->idproduto]) ?>">
                            <?= Html::img(Yii::getAlias('@imageurl') . '/' . $produtoFavorito->idproduto0->imagens[0]->nome, ['height' => "185px", 'class' => 'logo']); ?>
                            <p class="mt-2"><?= Html::encode($produtoFavorito->idproduto0->nome) ?></p>
                            <p><?= Html::encode($produtoFavorito->idproduto0->preco) ?> €</p>
                        </a>
                        <?php $form = ActiveForm::begin() ?>
                        <input type="hidden" id="hiddenidproduto" name="idproduto" value="<?= $produtoFavorito->idproduto ?>">
                        <?= Html::submitButton('Adicionar ao carrinho', ['class' => 'btn btn-primary']) ?>
                        <?php $form = ActiveForm::end(); ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
