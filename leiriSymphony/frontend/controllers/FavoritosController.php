<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Produtos;
use common\models\Produtosfavoritos;
use Yii;
use yii\web\Controller;

class FavoritosController extends Controller
{

    public function actionIndex(){
        $produtosFavoritos = Produtosfavoritos::find()->where(['idperfil' => Yii::$app->user->id])->all();
        return $this->render('index',[
            'model' => $produtosFavoritos,
        ]);
    }

    public function actionRemoverFavorito($idproduto){
        $produtoFavoritoExists = Produtosfavoritos::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $idproduto])->exists();
        if($produtoFavoritoExists){
            Produtosfavoritos::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $idproduto])->one()->delete();
            Yii::$app->session->setFlash('success', "Produto removido dos favoritos");
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionAdicionarFavorito($idproduto){
        $exists = Produtosfavoritos::find()->where(['idproduto' => $idproduto])->andWhere(['idperfil' => Yii::$app->user->id])->exists();
        if(!$exists) {
            $favorito = new Produtosfavoritos();
            $favorito->idproduto = $idproduto;
            $favorito->idperfil = Yii::$app->user->id;
            $favorito->save();
            Yii::$app->session->setFlash('success', "Produto adicionado aos favoritos");
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

}