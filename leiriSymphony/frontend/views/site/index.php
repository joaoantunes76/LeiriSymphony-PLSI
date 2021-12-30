<?php

use yii\helpers\Url;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $produtos common\models\Produtos */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="<?= Url::toRoute('site/eventos') ?>"><?= Html::img('@web/images/Sample-Event.png', ['class' => 'ls-logo d-block w-100', 'alt' => "First slide"]); ?></a>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/Sample-Event.png', ['class' => 'ls-logo d-block w-100', 'alt' => "Second slide"]); ?>
            </div>
            <div class="carousel-item">
                <?= Html::img('@web/images/Sample-Event.png', ['class' => 'ls-logo d-block w-100', 'alt' => "Third slide"]); ?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="body-content mt-5">
        <h4>Recentemente adicionados</h4>
        <div class="row mt-3 justify-content-start">
            <?php

            foreach ($produtos as $produto) {
            ?>
                <div class="col-md-3 text-center">
                    <?= $this->renderFile(Yii::getAlias('@app') . '/views/layouts/components/_product-item.php', ['produto' => $produto]); ?>
                </div>
            <?php
            }
            ?>
        </div>

        <br>
        <h4>Populares</h4>
        <div class="row mt-3 justify-content-center">
            <?php
            //this is equal to Recentemente adicionados
            //TODO: make this to most bought products
            foreach ($produtos as $produto) {
                ?>
                <div class="col-md-3 text-center">
                    <?= $this->renderFile(Yii::getAlias('@app') . '/views/layouts/components/_product-item.php', ['produto' => $produto]); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>