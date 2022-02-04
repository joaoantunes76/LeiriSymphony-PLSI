<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Albuns */
/* @var $userHasInInventory */


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
                        <div data-thumb="<?=Yii::getAlias('@imageurl') . '/' . $model->idimagem0->nome ?>">
                            <img src="<?=Yii::getAlias('@imageurl') . '/' . $model->idimagem0->nome ?>"  height="450px"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="s_product_text">
                    <h3><?= $model->nome ?></h3>
                    <?php
                    if(!$userHasInInventory){
                    ?>
                        <h2><?= $model->preco ?>€</h2>
                    <?php
                    }
                    ?>


                    <?php
                        if(!$userHasInInventory){
                    ?>
                    <div class="card_area d-flex justify-content-between align-items-center">
                        <a href=" <?= Url::toRoute('albuns/adicionar-carrinho?idalbum=' . $model->id)?>"
                           class="btn_3">+ adicionar ao carrinho</a>
                    </div>
                    <?php
                        }
                        else{
                        ?>
                            <div class="card_area d-flex justify-content-between align-items-center">
                                <a href=" <?= Url::toRoute('albuns/transferir-album?idalbum=' . $model->id)?>"
                                   class="btn_3">Transferir Album</a>
                            </div>
                        <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

    <section class="product_description_area">
        <div class="container">
            <h4>Artistas:</h4>
            <?php
            foreach ($model->albunsartistas as $albumartista) {
                ?>
                <p><?= $albumartista->idartista0->nome; ?></p>
                <?php
            }
            ?>

            <br>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="descricao-tab" data-toggle="tab" href="#descricao" role="tab" aria-controls="descricao"
                       aria-selected="false">Musicas</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="descricao" role="tabpanel" aria-labelledby="descricao-tab">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Musica</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($model->musicas as $musica){
                            ?>
                            <tr>
                                <td><?= $musica->nome ?></td>
                                <?php
                                    if($userHasInInventory){
                                ?>
                                <td><audio controls><source src="<?=Yii::getAlias('@musicurl').'/'.$musica->ficheiro?>" type="audio/ogg"></audio></td>
                                <?php
                                    }
                                    else{
                                    ?>
                                        <td><audio controls><source src="#" type="audio/ogg"></audio></td>
                                    <?php
                                    }
                                ?>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
