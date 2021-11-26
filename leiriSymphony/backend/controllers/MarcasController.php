<?php

namespace backend\controllers;

use common\models\Marcas;
use common\models\MarcasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarcasController implements the CRUD actions for Marcas model.
 */
class MarcasController extends Controller
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
     * Lists all Marcas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MarcasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Marcas model.
     * @param int $marcaId Marca ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($marcaId)
    {
        return $this->render('view', [
            'model' => $this->findModel($marcaId),
        ]);
    }

    /**
     * Creates a new Marcas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Marcas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'marcaId' => $model->marcaId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Marcas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $marcaId Marca ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($marcaId)
    {
        $model = $this->findModel($marcaId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'marcaId' => $model->marcaId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Marcas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $marcaId Marca ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($marcaId)
    {
        $this->findModel($marcaId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Marcas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $marcaId Marca ID
     * @return Marcas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($marcaId)
    {
        if (($model = Marcas::findOne($marcaId)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
