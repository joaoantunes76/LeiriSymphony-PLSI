<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */

$this->title = $model->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">


    <?php /*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'produtoId',
            'subcategoriaId',
            'marcaId',
            'produtoNome',
            'descricao:ntext',
            'digital',
            'preco',
            'ficheiro:ntext',
        ],
    ]) */ ?>

    <div class="row">
        <div class="col-5 text-center">
            <div class="row">
                <div class="col align-self-center">
                    <i class="ls-navbar-icons bi bi-chevron-left"></i>
                </div>
                <div class="col align-self-center">
                    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $model->imagens[0]->nome, ['width' => "250px", 'class' => 'logo']); ?></div>
                <div class="col align-self-center">
                    <i class="ls-navbar-icons bi bi-chevron-right"></i>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col d-flex justify-content-center">
                    <div class="ls-preview">
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
        </div>
        <div class="col-7">
            <div class="row mb-2">
                <div class="col">
                    <i class="ls-navbar-icons bi bi-star"></i>
                    <i class="ls-navbar-icons bi bi-star"></i>
                    <i class="ls-navbar-icons bi bi-star"></i>
                    <i class="ls-navbar-icons bi bi-star"></i>
                    <i class="ls-navbar-icons bi bi-star"></i>
                </div>
            </div>
            <h3 class="ls-text-primary"><?= Html::encode($this->title) ?></h3>
            <?= $model->descricao ?>
            <div class="row text-right">
                <div class="col">
                    <h6>Preço</h6>
                    <h4><?= Html::encode($model->preco) ?></h4>
                    <button class="btn btn-primary"> Adicionar ao carrinho</button>
                </div>
            </div>
        </div>
    </div>



</div>