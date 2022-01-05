<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model common\models\Carrinho */

use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;
use yii\bootstrap4\ActiveForm;

$this->title = 'Carrinho de Compras';
?>


<section class="product_list best_seller section_padding">
    <?php $form = ActiveForm::begin(['action' => ['carrinho/atualizar']]); ?>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12">
                        <div class="section_tittle text-center">
                            <h2>Carrinho de compras</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <?php
                    foreach ($model as $produtoCarrinho) {
                        $produto = $produtoCarrinho->idproduto0;
                        if ($produto->imagens != null) {
                            $imagemNome = $produto->imagens[0]->nome;
                        } else {
                            $imagemNome = "";
                        }
                        ?>
                        <div class="col-lg-4 col-sm-6">
                            <div class="single_product_item">
                                <a href="<?= Url::toRoute('produtos/view?produtoId=' . $produto->id) ?>">
                                    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                                </a>
                                <div class="single_product_text">
                                    <h4><?= $produto->nome ?></h4>
                                    <h3><?= $produto->preco ?>€</h3>
                                    <a href="<?= Url::toRoute('produtos/delete-carrinho?idproduto=' . $produto->id) ?>"
                                       class="add_cart">- remover do carrinho</a>
                                    <input type="number" id="quantidade" class=" single-input" min="1"
                                           name="<?= $produto->id ?>[quantidade]"
                                           value="<?= $produtoCarrinho->quantidade ?>">
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
                if ($model != null){
            ?>
                <div class="form-group text-center">
                    <?= Html::submitButton('Atualizar Quantidade', ['class' => 'genric-btn info radius']) ?>
                    <a href="<?= Url::toRoute('site/comprar') ?>" class="genric-btn success radius" onclick="goStep2()">Comprar</a>
                </div>
            <?php
                }
            ?>
        <?php $form = ActiveForm::end(); ?>
</section>