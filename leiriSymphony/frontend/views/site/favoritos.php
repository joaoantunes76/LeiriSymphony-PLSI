<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <h1 class="ls-text-primary">Lista de Desejos</h1>

    <div class="body-content mt-5">
        <div class="row mt-3">
            <div class="col text-right">
                <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i></a>
                <div class="text-left">
                    <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => 1]) ?>">
                        <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                        <p class="mt-2">Nome do produto</p>
                        <p>0.00€</p>
                    </a>
                    <button class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
            </div>

            <div class="col text-right">
                <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i></a>
                <div class="text-left">
                    <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => 1]) ?>">
                        <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                        <p class="mt-2">Nome do produto</p>
                        <p>0.00€</p>
                    </a>
                    <button class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
            </div>

            <div class="col text-right">
                <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i></a>
                <div class="text-left">
                    <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => 1]) ?>">
                        <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                        <p class="mt-2">Nome do produto</p>
                        <p>0.00€</p>
                    </a>
                    <button class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
            </div>

            <div class="col text-right">
                <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i></a>
                <div class="text-left">
                    <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => 1]) ?>">
                        <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                        <p class="mt-2">Nome do produto</p>
                        <p>0.00€</p>
                    </a>
                    <button class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
            </div>

            <div class="col text-right">
                <a href="<?= Url::toRoute('site/favoritos'); ?>"><i class="bi bi-heart-fill ls-text-primary ls-favorite-toggle"></i></a>
                <div class="text-left">
                    <a style="display:block;" class="col ls-produto" id="1" href="<?= Url::toRoute(['produtos/view', 'produtoId' => 1]) ?>">
                        <?= Html::img('@web/Guitarra-classica.png', ['height' => "185px", 'class' => 'Guitarra-classica']); ?>
                        <p class="mt-2">Nome do produto</p>
                        <p>0.00€</p>
                    </a>
                    <button class="btn btn-primary">Adicionar ao carrinho</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>