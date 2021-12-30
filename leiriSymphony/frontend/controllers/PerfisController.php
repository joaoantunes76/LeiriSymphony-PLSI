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
                $perfil->save();
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
