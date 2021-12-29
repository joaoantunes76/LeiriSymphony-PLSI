<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $produtos common\models\Produtos */
/* @var $marcas common\models\Marcas */
/* @var $categorias common\models\Categorias */
/* @var $subcategorias common\models\Subcategorias */

$this->title = 'Produtos';

?>

<script>

    function filtrar(){
        window.location = link;
    }
</script>

<!--================Category Product Area =================-->
<section class="cat_product_area section_padding">
    <div class="container">
        <?= $this->render('components/_filtertop.php', [
            'marcas' => $marcas,
            'categorias' => $categorias,
            'subcategorias' => $subcategorias,
        ]) ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="left_sidebar_area">
                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Marcas</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                    foreach ($marcas as $marca){
                                ?>
                                    <li>
                                        <a href="#"><?= $marca->nome ?></a>
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Categorias</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                foreach ($categorias as $categoria){
                                    ?>
                                    <li>
                                        <a href="#"><?= $categoria->nome ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="left_widgets p_filter_widgets">
                        <div class="l_w_title">
                            <h3>Subcategorias</h3>
                        </div>
                        <div class="widgets_inner">
                            <ul class="list">
                                <?php
                                foreach ($subcategorias as $subcategoria){
                                    ?>
                                    <li>
                                        <a href="#"><?= $subcategoria->nome ?></a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product_top_bar d-flex justify-content-between align-items-center">
                            <div class="single_product_menu">
                                <p><span><?= count($produtos) ?> </span> Prodict Found</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-center latest_product_inner">
                    <?php
                    foreach ($produtos as $produto) {
                        if ($produto->imagens != null) {
                            $imagemNome = $produto->imagens[0]->nome;
                        } else {
                            $imagemNome = "";
                        }
                        ?>

                            <div class="col-lg-4 col-sm-6">
                                <div class="single_product_item">
                                    <a href="<?= Url::toRoute('view?produtoId='.$produto->id) ?>">
                                    <?= Html::img(Yii::getAlias('@imageurl') . '/' . $imagemNome, ['width' => "255px", 'height' => "250px"]); ?>
                                    </a>
                                    <div class="single_product_text">
                                        <h4><?= $produto->nome ?></h4>
                                        <h3><?= $produto->preco ?>€</h3>
                                        <?php
                                        //TODO: Bernardo, mete este <a> a funcionar
                                        ?>
                                        <a href="#1" class="add_cart">+ adicionar ao carrinho <a href="#2"><i class="ti-heart"></i></a></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
