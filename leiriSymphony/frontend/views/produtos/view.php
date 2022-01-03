<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Produtos */
/* @var $existeFavorito common\models\Produtosfavoritos */
/* @var $avaliacoes common\models\Avaliacao */
/* @var $podeAvaliar */


$this->title = $model->nome;
\yii\web\YiiAsset::register($this);

?>




<section class="section_padding">
<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner justify-content-between">
            <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                    <div id="vertical">
                        <?php
                        foreach ($model->imagens as $imagem)
                        {
                        ?>
                            <div data-thumb="<?=Yii::getAlias('@imageurl') . '/' . $imagem->nome ?>">
                                <img src="<?=Yii::getAlias('@imageurl') . '/' . $imagem->nome ?>"  height="450px"/>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3><?= $model->nome ?></h3>
                    <h2><?= $model->preco ?>€</h2>
                    <ul class="list">
                        <li>
                            <a class="active" href="#">
                                <span>Categoria: </span> <?= $model->idsubcategoria0->idcategoria0->nome ?></a>
                        </li>
                        <li>
                            <a href="#"> <span>Stock: </span> <?= $model->stock > 0 ? "Disponivel" : "Esgotado" ?> </a>
                        </li>
                    </ul>
                    <p>
                        <b>Demonstração:</b>
                        <br>
                        <?php
                        //Todo: Adicionar desmonstrações
                        echo 'Sem demonstrações disponiveis'
                        ?>
                    </p>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <a href=" <?= $model->stock > 0 ? Url::toRoute('produtos/adicionar-carrinho?idproduto=' . $model->id) : "#esgotado" ?>"
                           class="<?= $model->stock > 0 ? "btn_3" : "genric-btn disable circle" ?>" >+ adicionar ao carrinho</a>

                        <?php
                        if($existeFavorito){
                            echo Html::a('<i class="ti-heart-broken"></i>',['favoritos/remover-favorito', 'idproduto' => $model->id], ['class' => 'like_us', 'title' => 'Remover dos favoritos']);
                        }else{
                            echo Html::a('<i class="ti-heart"></i>',['favoritos/adicionar-favorito', 'idproduto' => $model->id], ['class' => 'like_us', 'title' => 'Adicionar aos favoritos']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--================End Single Product Area =================-->



<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="descricao-tab" data-toggle="tab" href="#descricao" role="tab" aria-controls="descricao"
                   aria-selected="false">Descrição</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                   aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="descricao" role="tabpanel" aria-labelledby="descricao-tab">
                <?= $model->descricao ?>
            </div>
            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row total_rate">
                            <div class="col-12">
                                <div class="box_total">
                                    <h5>Geral</h5>
                                    <h4>
                                        <?php
                                            $somaEstrelas = 0;
                                            $i = 0;
                                            foreach($avaliacoes as $avaliacao){
                                                $i++;
                                                $somaEstrelas += $avaliacao->estrelas;
                                            }
                                            if($i > 0) {
                                                echo $somaEstrelas / $i;
                                            }
                                        ?>
                                    </h4>
                                    <h6>( <?= count($avaliacoes).' '.(count($avaliacoes) > 1 ? 'Classificações' : 'Classificação')?> )</h6>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="review_list">
                            <?php
                            foreach($avaliacoes as $avaliacao){
                            ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="media-body">
                                            <h4><?= $avaliacao->idperfil0->nome ?></h4>
                                            <?php
                                                for($i = 0; $i < $avaliacao->estrelas; $i++){
                                            ?>
                                                <i class="fa fa-star"></i>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <p>
                                        <?= $avaliacao->comentario ?>
                                    </p>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <?php
                                if($podeAvaliar){
                            ?>
                            <h4>Add a Review</h4>
                            <p>Your Rating:</p>
                            <?php $form = ActiveForm::begin(['class' => 'row contact_form', 'action' => ['produtos/add-rating?idproduto='.$model->id]]); ?>
                                <div class="col-md-12">
                                    <?= $this->render('components/_starrating.php'); ?>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="1" placeholder="Review"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" value="submit" class="btn_3">
                                        Submit Now
                                    </button>
                                </div>
                            <?php ActiveForm::end(); ?>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Product Description Area =================-->
