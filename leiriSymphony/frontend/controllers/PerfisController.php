<?php

namespace frontend\controllers;

use common\models\Encomendas;
use common\models\Perfis;
use Yii;
use yii\web\Controller;

class PerfisController extends Controller
{
    public function actionIndex()
    {
        $perfil = Perfis::findOne(['iduser' => Yii::$app->user->id]);
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        } else {
            if($this->request->isPost){
                $perfil->load($this->request->post());
                if($perfil->save()){
                    Yii::$app->session->setFlash('success', "Perfil alterado com sucesso");
                }
                else{
                    Yii::$app->session->setFlash('error', "Não foi possivel alterar o Perfil com sucesso");
                }
            }
            return $this->render('index', [
                'model' => $perfil,
            ]);
        }
    }

    /**
     * Displays encomedas page.
     *
     * @return mixed
     */
    public function actionEncomendas()
    {
        $encomendas = Encomendas::find()->where(['idperfil' => Yii::$app->user->id])->all();
        return $this->render('encomendas',
        [
            'model' => $encomendas,
        ]);
    }

}
