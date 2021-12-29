<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \common\models\Produtosfavoritos */
/* @var $produtoFavorito \common\models\Produtosfavoritos */

$this->title = 'My Yii Application';
?>

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Favoritos</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <?php
            foreach ($model as $produtoFavorito) {
                $produto = $produtoFavorito->idproduto0;
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
                            <a href="<?= Url::toRoute('produtos/add-favorito?idproduto=' . $produto->id) ?>"
                               class="add_cart">+ adicionar ao carrinho <a href="#2"><i class="ti-heart"></i></a></a>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>
</section>