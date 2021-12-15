<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Produtos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
        $produtos = $dataProvider->getModels();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'idsubcategoria0',
                'header' => 'Subcategoria',
                'value' => 'idsubcategoria0.nome',
                'format' => ['text'],
            ],
            [
                'attribute' => 'idmarca0',
                'header' => 'Marca',
                'value' => 'idmarca0.nome',
                'format' => ['text'],
            ],
            'nome',
            [
                'attribute' => 'nome',
                'header' => 'Nome',
                'format' => ['text'],
            ],
            'usado',
            'preco',
            'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);  ?>


</div>