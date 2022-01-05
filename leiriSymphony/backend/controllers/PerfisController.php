<?php

namespace app\controllers;

use common\models\perfis;
use common\models\perfisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfisController implements the CRUD actions for perfis model.
 */
class PerfisController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all perfis models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new perfisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single perfis model.
     * @param int $perfilId Perfil ID
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($perfilId, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($perfilId, $user_id),
        ]);
    }

    /**
     * Creates a new perfis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new perfis();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'perfilId' => $model->perfilId, 'user_id' => $model->user_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing perfis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $perfilId Perfil ID
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($perfilId, $user_id)
    {
        $model = $this->findModel($perfilId, $user_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'perfilId' => $model->perfilId, 'user_id' => $model->user_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing perfis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $perfilId Perfil ID
     * @param int $user_id User ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($perfilId, $user_id)
    {
        $this->findModel($perfilId, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the perfis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $perfilId Perfil ID
     * @param int $user_id User ID
     * @return perfis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($perfilId, $user_id)
    {
        if (($model = perfis::findOne(['perfilId' => $perfilId, 'user_id' => $user_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
