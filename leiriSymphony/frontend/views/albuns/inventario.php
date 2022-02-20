<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\Inventario */

use yii\helpers\Url;
use yii\bootstrap4\Html;

$this->title = 'Albuns';
?>


<section class="section_padding">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="section_tittle">
                    <h2>Álbuns (Inventario)</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <?php
            foreach ($model as $inventario) {
                $album = $inventario->albuns;
                if ($album->idimagem0 != null) {
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
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>