<?php

namespace frontend\controllers;

use common\models\Carrinho;
use Yii;
use yii\web\Controller;

class CarrinhoController extends Controller
{

    public function actionIndex(){
        $produtosCarrinho = Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->all();
        return $this->render('index',[
            'model' => $produtosCarrinho,
        ]);
    }

    public function actionAtualizar(){
        $haserrors = false;
        if($this->request->isPost){
            foreach($this->request->post() as $key=>$value){
                if(is_numeric($key)){
                    if(isset($value["quantidade"])) {
                        $carrinhoProduto = Carrinho::find()->where(['idperfil' => Yii::$app->user->id])->andWhere(['idproduto' => $key])->one();
                        if($carrinhoProduto!=null) {
                            $carrinhoProduto->quantidade = $value["quantidade"];
                            if(!$carrinhoProduto->save()){
                                $haserrors = true;
                            }
                        }
                    }
                }
            }
            if(!$haserrors){
                Yii::$app->session->setFlash('success', "Carrinho atualizado com sucesso.");
                return $this->redirect('index');
            }
            else{
                Yii::$app->session->setFlash('error', $carrinhoProduto->firstErrors);
                return $this->redirect('index');
            }

        }
        Yii::$app->session->setFlash('error', "Falha ao atualizar carrinho");
        return $this->redirect('index');
    }
}
