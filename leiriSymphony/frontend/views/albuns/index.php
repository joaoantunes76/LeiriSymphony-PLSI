<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\Albuns */

use yii\helpers\Url;
use yii\bootstrap4\Html;

$this->title = 'Albuns';
?>


<section class="section_padding">
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="section_tittle">
                    <h2>Albuns (Loja)</h2>
                    <?= $this->render('components/_filtertop.php') ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <?php
            foreach ($model as $album) {
                if ($album->idimagem != null) {
                    $imagemNome = $album->idimagem0->nome;
                } else {
                    $imagemNome = "";
                }
                ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_product_item">
                        <a href="<?= Url::toRoute('albuns/view?albumId=' . $album->id) ?>">
                            <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                        </a>
                        <div class="single_product_text">
                            <h4><?= $album->nome ?></h4>
                            <h3><?= $album->preco ?>€</h3>
                            <a href="<?= Url::toRoute('albuns/adicionar-carrinho?idalbum=' . $album->id) ?>"
                               class="add_cart">+ adicionar ao carrinho</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>