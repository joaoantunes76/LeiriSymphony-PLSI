<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $produtos common\models\Produtos */
/* @var $produtosPopulares common\models\Produtos */

$this->title = 'My Yii Application';
?>

<?php
if(isset($evento)){
?>
<!-- banner part start-->
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider">
                        <div class="row">
                            <div class="col-lg-5 col-md-8">
                                <div class="banner_text">
                                    <div class="banner_text_iner">
                                        <h1>Novo Evento</h1>
                                        <h2><?= $evento->data ?></h2>
                                        <p class="mt-5">
                                            <?php
                                                $out = strlen($evento->descricao) > 30 ? substr($evento->descricao,0,30)."..." : $evento->descricao;
                                                echo $out;
                                            ?>
                                        </p>
                                        <a href="<?= Url::toRoute('site/eventos') ?>" class="btn_2">Ver Detalhes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="banner_img d-none d-lg-block">
                                <img src="/img/banner_img.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-counter d-none"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner part start-->
<?php
}
?>

<!-- product_list part start-->
<section class="product_list best_seller section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Recentemente adicionados <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    //this is equal to Recentemente adicionados
                    //TODO: make this to most bought products
                    foreach ($produtos as $produto) {
                        if ($produto->imagens != null) {
                            $imagemNome = $produto->imagens[0]->nome;
                        } else {
                            $imagemNome = "";
                        }
                        ?>
                        <a href="<?= Url::toRoute("produtos/view?produtoId=".$produto->id) ?>">
                            <div class="single_product_item">
                                <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                                <div class="single_product_text">
                                    <h4><?= $produto->nome ?></h4>
                                    <h3><?= $produto->preco ?>€</h3>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <br>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Populares <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <?php
                    //this is equal to Recentemente adicionados
                    //TODO: make this to most bought products
                    foreach ($produtosPopulares as $produto) {
                        if ($produto->imagens != null) {
                            $imagemNome = $produto->imagens[0]->nome;
                        } else {
                            $imagemNome = "";
                        }
                        ?>
                        <a href="<?= Url::toRoute("produtos/view?produtoId=".$produto->id) ?>">
                            <div class="single_product_item">
                                <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                                <div class="single_product_text">
                                    <h4><?= $produto->nome ?></h4>
                                    <h3><?= $produto->preco ?>€</h3>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
