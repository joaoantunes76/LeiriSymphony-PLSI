<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */
/* @var $existeFavorito common\models\Produtosfavoritos */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);

?>

<div class="ls-product-view p-5 d-flex">
    <div class="d-flex flex-column">
        <div class="d-flex">
            <div class="d-flex flex-column mr-4">
                <?php
                foreach($model->imagens as $imagem) {
                    echo Html::img(Yii::getAlias('@imageurl') . '/' . $imagem->nome, ['width' => "42px", 'class' => 'mb-3 ls-product-view-img']);
                }
                ?>
            </div>
            <?= Html::img(Yii::getAlias('@imageurl') . '/' . $model->imagens[0]->nome, ['width' => "250px", 'class' => 'logo']); ?>
        </div>
        <div class="d-flex justify-content-center">
        <div class="ls-preview mt-5">
            <div class="ls-preview-row">
                <span>Instrumento Exemplo 1</span>
                <i class="ls-text-primary bi bi-play-fill"></i>
            </div>
            <div class="ls-preview-row">
                <span>Instrumento Exemplo 1</span>
                <i class="ls-text-primary bi bi-play-fill"></i>
            </div>
            <div class="ls-preview-row">
                <span>Instrumento Exemplo 1</span>
                <i class="ls-text-primary bi bi-play-fill"></i>
            </div>
        </div>
    </div>
    </div>
    <div class="ml-5 d-flex flex-column w-100">
        <div>
            <i class="ls-navbar-icons bi bi-star"></i>
            <i class="ls-navbar-icons bi bi-star"></i>
            <i class="ls-navbar-icons bi bi-star"></i>
            <i class="ls-navbar-icons bi bi-star"></i>
            <i class="ls-navbar-icons bi bi-star"></i>
        </div>
        <div class="mt-3">
            <h3 class="ls-text-primary"><?= Html::encode($this->title) ?></h3>
            <?= $model->descricao ?>
        </div>
        <div class="text-right">
            <h6>Preço</h6>
            <h4><?= Html::encode($model->preco) ?> €</h4>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

            <?= Html::submitButton('Adicionar ao carrinho', ['class' => 'btn btn-primary']) ?>

            <?php ActiveForm::end(); ?>
            <?php
                if($existeFavorito){
                    echo Html::a('<i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i>',['produtos/add-favorito', 'idproduto' => $model->id], ['class' => 'btn btn-black', 'title' => 'Remover dos favoritos']);
                }else{
                    echo Html::a('<i class="bi bi-heart ls-text-primary ls-favorite-toggle"></i>',['produtos/add-favorito', 'idproduto' => $model->id], ['class' => 'btn btn-black', 'title' => 'Adicionar aos favoritos']);
                }
            ?>
        </div>
    </div>
</div>