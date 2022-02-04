<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Carrinhoalbuns;
use common\models\Albuns;
use common\models\Inventario;
use common\models\Perfis;
use frontend\models\PagamentoOnline;
use Yii;
use yii\web\Controller;
use ZipArchive;

class AlbunsController extends Controller
{
    public function actionIndex(){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            $inventarios = Inventario::find()->where(['perfis_id' => $perfil->id])->all();
            $inventarioAlbunsId = [];
            foreach ($inventarios as $inventario){
                array_push($inventarioAlbunsId, $inventario->albuns_id);
            }
            $albuns = Albuns::find()->where(['not in','id',$inventarioAlbunsId])->all();
        }
        else{
            $albuns = Albuns::find()->all();
        }
        return $this->render('index', [
            'model' => $albuns
        ]);
    }

    public function actionInventario(){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null){
            $inventario = Inventario::find()->where(['perfis_id' => $perfil->id])->all();
            return $this->render('inventario', [
                'model' => $inventario
            ]);

        }
        return $this->redirect(['site/login']);
    }

    public function actionView($albumId){
        $album = Albuns::find()->where(['id' => $albumId])->one();
        $userHasInInventory = false;

        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            if(Inventario::find()->where(['perfis_id' => $perfil->id, 'albuns_id' => $albumId])->exists()){
                $userHasInInventory = true;
            }
        }

        return $this->render('view', [
            'model' => $album,
            'userHasInInventory' => $userHasInInventory
        ]);
    }

    public function actionCarrinho(){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            $carrinhoalbuns = Carrinhoalbuns::find()->where(['perfis_id' => $perfil->id])->all();
            return $this->render('carrinho', [
                'model' => $carrinhoalbuns
            ]);
        }
        return $this->redirect(['site/login']);
    }

    public function actionAdicionarCarrinho($idalbum){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            if(!Carrinhoalbuns::find()->where(['perfis_id' => $perfil->id, 'albuns_id' => $idalbum])->exists()) {
                $carrinhoalbum = new Carrinhoalbuns();
                $carrinhoalbum->albuns_id = $idalbum;
                $carrinhoalbum->perfis_id = $perfil->id;
                if($carrinhoalbum->validate() && $carrinhoalbum->save()){
                    Yii::$app->session->setFlash('success', "Album adicionado ao carrinho");
                }
                else{
                    Yii::$app->session->setFlash('error', $carrinhoalbum->firstErrors);
                }
            }
            else {
                Yii::$app->session->setFlash('error', "Este album já existe no carrinho");
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(['site/login']);
    }

    public function actionTransferirAlbum($idalbum){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            if(Inventario::find()->where(['perfis_id' => $perfil->id, 'albuns_id' => $idalbum])->exists()) {
                $album = Albuns::find()->where(['id' => $idalbum])->one();
                $zip = new \ZipArchive();
                $tmp_file = tempnam('.','');
                if($zip->open($tmp_file, ZipArchive::CREATE) !== true){
                    Yii::$app->session->setFlash('error', "Ocorreu um erro a preparar o album para a transferencia");
                    return $this->redirect(Yii::$app->request->referrer);
                }

                foreach ($album->musicas as $musica){
                    $download_file = file_get_contents(Yii::getAlias('@musicurl').'/'.$musica->ficheiro);
                    //$zip->addFromString(basename($album->nome),$download_file);
                    $zip->addFile(Yii::getAlias('@musicpath').'/'.$musica->ficheiro, $musica->ficheiro);
                }
                $zip->close();
                header('Content-disposition: attachment; filename=Resumes.zip');
                header('Content-type: application/zip');
                readfile($tmp_file);
                unlink($tmp_file);
            }
            else {
                Yii::$app->session->setFlash('error', "O utilizador não tem este album");
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(['site/login']);
    }

    public function actionDeleteCarrinho($albumId){
        $perfil = Perfis::find()->where(['iduser' => Yii::$app->user->id])->one();
        if($perfil != null) {
            if(Carrinhoalbuns::find()->where(['perfis_id' => $perfil->id, 'albuns_id' => $albumId])->exists()) {
                Carrinhoalbuns::find()->where(['perfis_id' => $perfil->id, 'albuns_id' => $albumId])->one()->delete();
                Yii::$app->session->setFlash('success', "Album removido do carrinho");
            }
            else {
                Yii::$app->session->setFlash('error', "Este album não existe no carrinho");
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->redirect(['site/login']);
    }

    public function actionComprar()
    {
        $perfil = Perfis::findOne(Yii::$app->user->id);
        $albunsCarrinhos = Carrinhoalbuns::find()->where(['perfis_id' => $perfil->id])->all();
        $pagamentoOnline = new PagamentoOnline();
        $erroCartao = false;
        $erroCompra = false;

        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', "É necessário fazer login para realizar compras.");
        } else {
            if($this->request->isPost){
                $pagamentoOnline->load($this->request->post());
                    if(!$pagamentoOnline->validate()) {
                        $erroCartao = true;
                        Yii::$app->session->setFlash('error', $pagamentoOnline->firstErrors);
                        return $this->render('comprar', [
                            'model' => $albunsCarrinhos,
                            'perfil' => $perfil,
                            'pagamentoOnline' => $pagamentoOnline,
                        ]);
                    }

                foreach ($albunsCarrinhos as $albumCarrinho) {
                    $inventario = new Inventario();
                    $inventario->perfis_id = $perfil->id;
                    $inventario->albuns_id = $albumCarrinho->albuns_id;
                    if(!($inventario->validate() && $inventario->save())) {
                        $erroCompra = true;
                    }
                    else{
                        $albumCarrinho->delete();
                    }
                }

                if(!$erroCompra && !$erroCartao){
                    $this->redirect(['site/sucesso']);
                }
                else{
                    Yii::$app->session->setFlash('error', "Ocorreu um erro a realizar a compra");
                    return $this->render('comprar', [
                        'model' => $albunsCarrinhos,
                        'perfil' => $perfil,
                        'pagamentoOnline' => $pagamentoOnline,
                    ]);
                }
            }

            return $this->render('comprar', [
                'model' => $albunsCarrinhos,
                'perfil' => $perfil,
                'pagamentoOnline' => $pagamentoOnline,
            ]);
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

}
